<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MBrand;
use App\Models\MColor;
use App\Models\MProduct;
use App\Models\MShop;
use App\Models\SalesProduct;
use App\Services\SendMailService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class SalesProductController extends Controller
{
    private SendMailService $sendMailService;
    
    /**
     * @param SendMailService $sendMailService
     */
    public function __construct(
        SendMailService $sendMailService
    ) {
        $this->sendMailService = $sendMailService;
    }
    /**
     * 製品の追加登録 入力画面
     * @return View
     */
    public function product(): View
    {
        $sales_product = Session::get('product', []);
        $back = url()->previous();
        
        $colors = MColor::withTrashed()
            ->select(['id', 'alphabet_name', 'name'])
            ->get()
            ->mapWithKeys(function ($color) {
                return [$color->id => $color->alphabet_name.' / '.$color->name];
            })
            ->toArray();
        
        $products = MProduct::select(['id', 'name_kana', 'name'])
            ->get()
            ->mapWithKeys(function ($product) {
                return [$product->id => $product->name.' / '.$product->name_kana];
            })
            ->toArray();
        
        
        return view('web.mypage.product.add')->with([
            'sales_product' => $sales_product,
            'brands' => MBrand::query()->public()->pluck('name', 'id')->toArray(),
            'products' => $products,
            'colors' => $colors,
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
            'back' => $back
        ]);
    }
    
    /**
     * @param StoreProductRequest $request
     * @return RedirectResponse
     */
    public function productAdd(StoreProductrequest $request): RedirectResponse
    {
        return redirect()->route('mypage.confirm');
    }
    
    /**
     * @return View
     */
    public function productConfirm(): View
    {
        $product = Session::get('product');
        
        return view('web.mypage.product.confirm')->with([
            'product' => $product,
            'brands' => MBrand::query()->public()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->public()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }
    
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $product = Session::get('product');

        try {
            SalesProduct::create([
                'm_product_id' => data_get($product, 'm_product_id'),
                'user_id' => \Auth::user()->id,
                'purchase_date' => data_get($product, 'purchase_date'),
                'm_shop_id' => data_get($product, 'm_shop_id') && data_get($product, 'm_shop_id') != 'other' ? data_get($product, 'm_shop_id') : NULL,
                'product_code' => data_get($product, 'product_code'),
                'm_color_id' => data_get($product, 'm_color_id') && data_get($product, 'm_color_id') != 'other' ? data_get($product, 'm_color_id') : NULL,
                'other_color_name' => data_get($product, 'other_color_name'),
                'other_shop_name' => data_get($product, 'other_shop_name'),
            ]);

            \DB::commit();
            // メールの送信
            $this->sendMailService->send('product_registration', [], 1);
            Session::forget('product');

            return redirect()
                ->route('mypage.index')
                ->with('success', '登録が完了しました。');

        } catch (\Exception $e) {
            \DB::rollBack();
        }

        \Session::forget('product');

        return redirect()
            ->back()
            ->with('alert', 'エラーが発生しました。');
    }
    
    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function jsGetTyingArray(Request $request): Response|Application|ResponseFactory
    {
        $key = $request->input('key_name');
        $id = $request->input('id');
        $sales_id = $request->input('sales_id');
        
        switch ($key) {
            case 'brand':
                $items = MProduct::query()->where('m_brand_id', $id)
                    ->select(['id', 'name_kana', 'name'])
                    ->get()
                    ->mapWithKeys(function ($product) {
                        return [$product->id => $product->name.' / '.$product->name_kana];
                    })
                    ->toArray();
                
                $view = view('web.mypage.product._ajax_select_product_list', [
                    'items' => $items,
                    'checkVal' => false,
                    'id' => $id,
                    'sales_id' => $sales_id
                ])->render();
                break;
            case 'product':
                $product = MProduct::find($id);
                $color_array = explode(',', $product->color_array);
                $items = MBrand::query()->pluck('name', 'id');
                $view = view('web.mypage.product._ajax_select_brand_list', [
                    'items' => $items,
                    'checkVal' => $product->m_brand_id,
                    'id' => $id,
                    'sales_id' => $sales_id
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
     * @return Application|ResponseFactory|Response
     */
    public function jsGetTyingColorArray(Request $request): Response|Application|ResponseFactory
    {
        $id = $request->input('id');
        
        $product = MProduct::find($id);
        $color_array = explode(',', $product->color_array);
        $colors = MColor::withTrashed()
            ->select(['id', 'alphabet_name', 'name'])
            ->whereIn('id', $color_array)
            ->get()
            ->mapWithKeys(function ($color) {
                return [$color->id => $color->alphabet_name.' / '.$color->name];
            })
            ->toArray();

        $view = view('web.mypage.product._ajax_select_color_list', [
            'colors' => $colors,
            'checkVal' => false,
            'page' => $request->get('page') ?? null,
            
        ])->render();
        
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
