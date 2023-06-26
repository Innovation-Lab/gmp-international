<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Routing\ResponseFactory;
// use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\AdminUserProductStoreRequest;
use App\Models\User;
use App\Models\MBrand;
use App\Models\MProduct;
use App\Models\MColor;
use App\Models\MShop;
use App\Models\SalesProduct;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private UserRepositoryInterface $userRepository;

    /**
     * ユーザー一覧
     *
     * @param Request $request
     * @return Application|Factory|View
     */

    /**
     * @param UserRepositoryInterface $userRepository
     */

     public function __construct(
        UserRepositoryInterface $userRepository,
    ) {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request): View|Factory|Application
    {
        return view('admin.users.index', [
            'users' => $this->userRepository->search($request)->orderByDesc('id')->paginate(50),
            'brands' => MBrand::query()->public()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->public()->pluck('name', 'id')->toArray(),
            'request' => $request,
        ]);
    }
    
    /**
     * @param $id
     * @return Application|Factory|View
     */
    // public function detail($id): View|Factory|Application
    // {
    //     $user = User::find($id);

    //     return view('admin.users.detail', compact('user'));
    // }
    public function create(): View
    {
        $prefectures = config('prefecture');

        return view('admin.users.create.index')->with([
            'prefectures' => $prefectures,
            'brands' => MBrand::query()->public()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->public()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }

    public function store(AdminUserProductStoreRequest $request)
    {
        $params = $request->all();
        $params['password'] = Hash::make($request->input('password'));

        \DB::beginTransaction();
        try {
            $user = User::create([
                'last_name' => data_get($params, 'last_name'),
                'first_name' => data_get($params, 'first_name'),
                'last_name_kana' => data_get($params, 'last_name_kana'),
                'first_name_kana' => data_get($params, 'first_name_kana'),
                'email' => data_get($params, 'email'),
                'tel' => data_get($params, 'tel'),
                'is_dm' => data_get($params, 'is_dm'),
                'zip_code' => data_get($params, 'zip_code'),
                'prefecture' => data_get($params, 'prefecture'),
                'address_city' => data_get($params, 'address_city'),
                'address_block' => data_get($params, 'address_block'),
                'address_building' => data_get($params, 'address_building'),
                'password' => data_get($params, 'password'),
                'memo' => data_get($params, 'user_memo'),
            ]);

            SalesProduct::create([
                'user_id' => data_get($user, 'id'),
                'purchase_date' => data_get($params, 'purchase_date'),
                'm_brand_id' => data_get($params, 'm_brand_id'),
                'm_product_id' => data_get($params, 'm_product_id'),
                'm_color_id' => data_get($params, 'm_color_id') && data_get($params, 'm_color_id') != 'other' ? data_get($params, 'm_color_id') : NULL,
                'other_color_name' => data_get($params, 'other_color_name'),
                'product_code' => data_get($params, 'product_code'),
                'm_shop_id' => data_get($params, 'm_shop_id') && data_get($params, 'm_shop_id') != 'other' ? data_get($params, 'm_shop_id') : NULL,
                'zip_code' => data_get($params, 'zip_code'),
                'prefecture' => data_get($params, 'prefecture'),
                'other_shop_name' => data_get($params, 'other_shop_name'),
                'memo' => data_get($params, 'product_memo'),
            ]);

            \DB::commit();

            return redirect()
                ->route('admin.users.index')
                ->with('success', '登録が完了しました。');
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()
                ->back()
                ->with('alert', 'エラーが発生しました。');
        }
    }

    public function createProducts(User $user): View
    {
        return view('admin.users.create.products')->with([
            'user' => $user,
            'brands' => MBrand::query()->public()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->public()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }

    public function storeProducts(StoreProductRequest $request, User $user)
    {
        $params = $request->all();

        \DB::beginTransaction();
        try{
            SalesProduct::create([
                'm_product_id' => data_get($params, 'm_product_id'),
                'user_id' => data_get($user, 'id'),
                'purchase_date' => data_get($params, 'purchase_date'),
                'm_shop_id' => data_get($params, 'm_shop_id') && data_get($params, 'm_shop_id') != 'other' ? data_get($params, 'm_shop_id') : NULL,
                'product_code' => data_get($params, 'product_code'),
                'm_color_id' => data_get($params, 'm_color_id') && data_get($params, 'm_color_id') != 'other' ? data_get($params, 'm_color_id') : NULL,
                'other_color_name' => data_get($params, 'other_color_name'),
                'other_shop_name' => data_get($params, 'other_shop_name'),
            ]);

            \DB::commit();

            return redirect()
                ->route('admin.users.detail', $user)
                ->with('success', '登録が完了しました。');
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect()
                ->back()
                ->with('alert', 'エラーが発生しました。');
        }
    }

    public function detail(User $user): View
    {
        $sales_products = data_get($user, 'salesProducts');

        return view('admin.users.detail.index')->with([
            'user' => $user,
            'sales_products' => $sales_products,
        ]);
    }

    public function editUser(User $user): View
    {
        $prefectures = config('prefecture');

        return view('admin.users.edit.user')->with([
            'user' => $user,
            'prefectures' => $prefectures,
        ]);
    }

    /**
     * 基本情報 更新
     * @param AdminUserUpdateRequest $request
     * @return RedirectResponse
     */
    public function updateUser(User $user, AdminUserUpdateRequest $request)
    {
        if ($this->userRepository->userUpdate($user, $request)) {
            return redirect()
            ->route('admin.users.detail', $user)
            ->with('status', 'success')
            ->with('success', '更新が完了しました。');
        } else {
            return redirect()
                ->back()
                ->with('status', 'failed')
                ->with('alert', '更新に失敗しました。');
        }
    }

    public function editProducts(User $user, SalesProduct $sales_product): View
    {
        return view('admin.users.edit.products')->with([
            'user' => $user,
            'sales_product' => $sales_product,
            'brands' => MBrand::query()->public()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->public()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }

    /**
     * 購入製品情報 更新
     * @param StoreProductRequest $request
     * @return RedirectResponse
     */
    public function updateProducts(User $user, SalesProduct $sales_product, StoreProductRequest $request)
    {
        $params = $request->all();
        $user = data_get($sales_product, 'user');

        \DB::beginTransaction();
        try {
            $sales_product->update([
                'purchase_date' => data_get($params, 'purchase_date'),
                'm_brand_id' => data_get($params, 'm_brand_id'),
                'm_product_id' => data_get($params, 'm_product_id'),
                'm_color_id' => data_get($params, 'm_color_id') && data_get($params, 'm_color_id') != 'other' ? data_get($params, 'm_color_id') : NULL,
                'product_code' => data_get($params, 'product_code'),
                'm_shop_id' => data_get($params, 'm_shop_id') && data_get($params, 'm_shop_id') != 'other' ? data_get($params, 'm_shop_id') : NULL,
                'other_color_name' => data_get($params, 'other_color_name') && data_get($params, 'm_color_id') == 'other' ? data_get($params, 'other_color_name') : NULL,
                'other_shop_name' => data_get($params, 'other_shop_name') && data_get($params, 'm_shop_id') == 'other' ? data_get($params, 'other_shop_name') : NULL,
                'memo' => data_get($params, 'memo'),
            ]);

            \DB::commit();

            return redirect()
                ->route('admin.users.detail', $user)
                ->with('success', '更新が完了しました。');

        } catch(\Exception $e) {
            \DB::rollback();
        }

        return redirect()
            ->back()
            ->with('alert', 'エラーが発生しました。');
    }

    // public function userEdit(): View
    // {
    //     return view('admin.users.detail.edit.userEdit');
    // }
    
    // /**
    //  * @param User $user
    //  * @return Application|Factory|View
    //  */
    // public function edit(User $user): View|Factory|Application
    // {
    //     return view('admin.users.edit', compact('user'));
    // }
    
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = User::find($request->input('user_id'));
        $this->userRepository->destroy($user);
        return redirect()->route('admin.users.index');
    }

    public function jsGetTyingArray(Request $request)
    {
        $key = $request->input('key_name');
        $id = $request->input('id');

        switch ($key) {
            case 'brand':
                $items = MProduct::query()->where('m_brand_id', $id)->pluck('name', 'id');
                $view = view('admin.products.create._ajax_select_product_list', [
                    'items' => $items,
                    'checkVal' => false,
                    'id' => $id,
                ])->render();
                break;
            case 'product':
                $product = MProduct::find($id);
                $color_array = explode(',', $product->color_array);
                $items = MBrand::query()->pluck('name', 'id');
                $view = view('admin.products.create._ajax_select_brand_list', [
                    'items' => $items,
                    'checkVal' => $product->m_brand_id,
                    'id' => $id,
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
    public function jsGetTyingColorArray(Request $request)
    {
        $id = $request->input('id');
        $product = MProduct::find($id);
        $color_array = explode(',', $product->color_array);
        $colors = MColor::query()->whereIn('id', $color_array)->pluck('alphabet_name', 'id');

        $view = view('admin.products.create._ajax_select_color_list', [
            'colors' => $colors,
            'checkVal' => false,
        ])->render();
        
        return response($view, 200)
            ->header('Content-Type', 'text/plain');
    }
}
