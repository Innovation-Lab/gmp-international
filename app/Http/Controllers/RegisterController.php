<?php

namespace App\Http\Controllers;

use App\Http\Requests\MultiStoreProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\MBrand;
use App\Models\MColor;
use App\Models\MProduct;
use App\Models\MShop;
use App\Models\SalesProduct;
use App\Repositories\UserRepositoryInterface;
use App\Services\SendMailService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\StoreInformationRequest;
use App\Providers\RouteServiceProvider;

class RegisterController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private SendMailService $sendMailService;
    
    /**
     * @param UserRepositoryInterface $userRepository
     * @param SendMailService $sendMailService
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        SendMailService $sendMailService
    ) {
        $this->userRepository = $userRepository;
        $this->sendMailService = $sendMailService;
    }
    
    /**
     * @return Application|Factory|View
     */
    public function login(): View|Factory|Application
    {
        return view('web.auth.login');
    }
    
    /**
     * @return Application|Factory|View
     */
    public function terms(): View|Factory|Application
    {
        return view('web.register.terms');
    }
    
    /**
     * @return Application|Factory|View
     */
    public function account(): View|Factory|Application
    {
        $user = Session::get('user_info', []);

        return view('web.register.account', [
            'user' => $user
        ]);
    }
    
    /**
     * @param StoreAccountRequest $request
     * @return RedirectResponse
     */
    public function storeAccount(StoreAccountRequest $request): RedirectResponse
    {
        $skip = $request->input('is_skip', 0);
        
        Session::put('user_info', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        
        return match ($skip) {
            0 => redirect()->route('register.info'),
            1 => redirect()->route('register.product'),
        };
    }
    
    /**
     * @return Application|Factory|View
     */
    public function userInfo(): View|Factory|Application
    {
        return view('web.register.user');
    }
    
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function information(Request $request): View|Factory|Application
    {
        return view('web.register.user',[
                'prefectures' => config('prefecture'),
                'user' => Session::get('user_info', [])
        ]);
    }
    
    /**
     * @param StoreInformationRequest $request
     * @return RedirectResponse
     */
    public function storeInformation(StoreInformationRequest $request): RedirectResponse
    {
        $skip = $request->input('is_skip', '0');
        $params = $request->all();
        $account = Session::get('user_info', []);

        session()->put('user_info', [
            'email' => data_get($account, 'email'),
            'password' => data_get($account, 'password'),
            'last_name' => data_get($params, 'last_name'),
            'first_name' => data_get($params, 'first_name'),
            'last_name_kana' => data_get($params, 'last_name_kana'),
            'first_name_kana' => data_get($params, 'first_name_kana'),
            'zip_code' => data_get($params, 'zip_code'),
            'prefecture' => data_get($params, 'prefecture'),
            'address_city' => data_get($params, 'address_city'),
            'address_block' => data_get($params, 'address_block'),
            'address_building' => data_get($params, 'address_building'),
            'tel' => data_get($params, 'tel'),
            'is_catalog' => data_get($params, 'is_catalog'),
            'is_dm' => data_get($params, 'is_dm')
        ]);
        
        return match ($skip) {
            '0' => redirect()->route('register.product'),
            '1' => redirect()->route('register.confirm'),
        };
    }
    
    /**
     * @return Application|Factory|View
     */
    public function product(): View|Factory|Application
    {
        $sales_products = Session::get('products', []);
        
        if (count($sales_products) > 0) {
            return view('web.register.product_fix', [
                'sales_products' => $sales_products,
                'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
                'products' => MProduct::query()->pluck('name', 'id')->toArray(),
                'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
                'shops' => MShop::query()->pluck('name', 'id')->toArray(),
            ]);
        }
        
        return view('web.register.product', [
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }
    
    /**
     * @param MultiStoreProductRequest $request
     * @return RedirectResponse
     */
    public function storeProduct(MultiStoreProductRequest $request): RedirectResponse
    {
        $products = $request->input('products', []);

        Session::put('products', $products);
        
        return  redirect()->route('register.confirm');
    }
    
    /**
     * @return Application|Factory|View
     */
    public function confirm(): View|Factory|Application
    {
        return view('web.register.confirm', [
            'user' => Session::get('user_info', []),
            'sales_products' => Session::get('products', []),
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }
    
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeVariable(Request $request): RedirectResponse
    {
        $user = Session::get('user_info', []);
        $product = Session::get('products', []);
        
        if (!$this->userRepository->createWithProduct($user, $product)) {
            return redirect()
                ->back()
                ->with(['error' => 'エラーが発生しました。']);
        }
        
        Session::forget('user_info');
        Session::forget('products');
        
        return redirect()->route('register.complete');
    }
    
    /**
     * @return Application|Factory|View
     */
    public function complete(): View|Factory|Application
    {
        return view('web.register.complete');
    }
    
    /**
     * @return JsonResponse
     */
    public function jsGetArray(): JsonResponse
    {
        $brands = MBrand::query()->pluck('name', 'id')->toArray();
        $products = MProduct::query()->pluck('name', 'id')->toArray();
        $colors = MColor::query()->pluck('alphabet_name', 'id')->toArray();
        $shops = MShop::query()->pluck('name', 'id')->toArray();
        
        $array = [
            'brands' => $brands,
            'products' => $products,
            'colors' => $colors,
            'shops' => $shops,
        ];

        return response()->json($array);
    }
    
    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function jsGetTyingArray(Request $request): Response|Application|ResponseFactory
    {

        $key = $request->input('key_name');
        $id = $request->input('id');
        $loop_num = $request->input('loop');
   
        switch ($key) {
            case 'brand':
                $items = MProduct::query()->where('m_brand_id', $id)->pluck('name', 'id');
                $view = view('web.register._ajax_select_product_list', [
                    'items' => $items,
                    'checkVal' => false,
                    'loop_num' => $loop_num
                ])->render();
                break;
            case 'product':
                $product = MProduct::find($id);
                $color_array = explode(',', $product->color_array);
                $items = MBrand::query()->pluck('name', 'id');
                $view = view('web.register._ajax_select_brand_list', [
                    'items' => $items,
                    'checkVal' => $product->m_brand_id,
                    'loop_num' => $loop_num
                ])->render();
                break;
            default:
                $view = NULL;
        }

        return response($view, 200)
            ->header('Content-Type', 'text/plain');
    }
    
    
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function jsSearchSerial(Request $request): JsonResponse
    {
        $search = SalesProduct::where('product_code', $request->get('code'))->count();
        $result = $search > 0;
        
        return response()->json($result);
    }
    
    
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function jsGetSerialGuideType(Request $request): JsonResponse
    {
        $search = MProduct::find($request->get('id'));
        $result = data_get($search, 'serial_guide_type');
        
        return response()->json($result);
    }
}
