<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\User;
use App\Models\MBrand;
use App\Models\MProduct;
use App\Models\MColor;
use App\Models\MShop;
use App\Models\SalesProduct;
use App\Repositories\UserRepositoryInterface;
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
            'users' => $this->userRepository->search($request)->orderByDesc('id')->paginate(20),
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->pluck('name', 'id')->toArray(),
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
        return view('admin.users.create.index')->with([
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }

    public function createProducts(User $user): View
    {
        return view('admin.users.create.products')->with([
            'user' => $user,
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->pluck('name', 'id')->toArray(),
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
                ->with('message', '登録が完了しました。');
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect()
                ->back()
                ->with('error', 'エラーが発生しました。');;
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
            ->with('message', '更新が完了しました。');
        } else {
            return redirect()
                ->back()
                ->with('status', 'failed')
                ->with('message', '更新に失敗しました。');
        }
    }

    public function editProducts(User $user, SalesProduct $sales_product): View
    {
        return view('admin.users.edit.products')->with([
            'user' => $user,
            'sales_product' => $sales_product,
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }

    /**
     * 購入製品情報 更新
     * @param StoreProductRequest $request
     * @return RedirectResponse
     */
    public function updateProducts(SalesProduct $sales_product, StoreProductRequest $request)
    {
        $params = $request->all();

        \DB::beginTransaction();
        try {
            $sales_product->update([
                'purchase_date' => data_get($params, 'purchase_date'),
                'm_brand_id' => data_get($params, 'm_brand_id'),
                'm_product_id' => data_get($params, 'm_product_id'),
                'm_color_id' => data_get($params, 'm_color_id'),
                'product_code' => data_get($params, 'product_code'),
                'm_shop_id' => data_get($params, 'm_shop_id'),
                'memo' => data_get($params, 'memo'),
            ]);

            \DB::commit();

            return redirect($request->headers->get('referer'))
                ->with('message', '更新が完了しました。');

        } catch(\Exception $e) {
            \DB::rollback();
        }

        return redirect()
            ->back()
            ->with('error', 'エラーが発生しました。');
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
        $user = User::find($request->input('userId'));
        $timestamp = Carbon::now()->format('YmdHi');
        $user->fill([
            'email' => $user->email.'@'.$timestamp,
            'tel' => $user->tel.'@'.$timestamp,
            'firebase_uid' => $user->firebase_uid.'@'.$timestamp
        ])->save();
        $user->cars->each(function ($car) {
            $car->delete();
        });
        $user->delete();
        return redirect()->route('user.index');
    }
}
