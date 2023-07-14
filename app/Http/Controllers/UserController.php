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
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\StoreInformationRequest;
use App\Http\Requests\StoreProductRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private UserRepositoryInterface $user_repository;
    private SendMailService $sendMailService;
    
    public function __construct(
        UserRepositoryInterface $user_repository,
        SendMailService $sendMailService
    )
    {
        $this->user_repository = $user_repository;
        $this->sendMailService = $sendMailService;
    }

    /**
     * ユーザー一覧
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        Session::forget('product');
        $user = Auth::user();
        $sales_products = data_get($user, 'salesProducts');
        
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
        
        return view('web.mypage.index')->with([
            'user' => $user,
            'sales_products' => $sales_products,
            'brands' => MBrand::query()->public()->pluck('name', 'id')->toArray(),
            'products' => $products,
            'colors' => $colors,
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);

    }
    
    /**
     * 登録製品一覧
     * @return View
     */
    public function product(): View
    {
        Session::forget('product');
        $user = Auth::user();
        $sales_products = data_get($user, 'salesProducts');
        
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

        return view('web.mypage.product.index')->with([
            'user' => $user,
            'sales_products' => $sales_products,
            'brands' => MBrand::query()->public()->pluck('name', 'id')->toArray(),
            'products' => $products,
            'colors' => $colors,
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }
    
    /**
     * 登録済み製品 更新
     * @param SalesProduct $sales_product
     * @param StoreProductRequest $request
     * @return RedirectResponse
     */
    public function update(SalesProduct $sales_product , StoreProductRequest $request): RedirectResponse
    {
        $params = $request->all();
        
        \DB::beginTransaction();
        try {
            $sales_product->update([
                'm_product_id' => data_get($params, 'm_product_id'),
                'user_id' => \Auth::user()->id,
                'purchase_date' => data_get($params, 'purchase_date'),
                'm_shop_id' => data_get($params, 'm_shop_id') && data_get($params, 'm_shop_id') != 'other' ? data_get($params, 'm_shop_id') : NULL,
                'product_code' => data_get($params, 'product_code'),
                'm_color_id' => data_get($params, 'm_color_id') && data_get($params, 'm_color_id') != 'other' ? data_get($params, 'm_color_id') : NULL,
                'other_color_name' => data_get($params, 'other_color_name') && data_get($params, 'm_color_id') == 'other' ? data_get($params, 'other_color_name') : NULL,
                'other_shop_name' => data_get($params, 'other_shop_name') && data_get($params, 'm_shop_id') == 'other' ? data_get($params, 'other_shop_name') : NULL,
            ]);

            \DB::commit();

            return redirect($request->headers->get('referer'))
                ->with('success', '更新が完了しました。');

        } catch (\Exception $e) {
            \DB::rollBack();
        }

        return redirect()
            ->back()
            ->with('alert', 'エラーが発生しました。');
    }
    
    /**
     * 登録済み製品 削除
     * @param SalesProduct $sales_product
     * @param Request $request
     * @return RedirectResponse
     */
    public function productDelete(SalesProduct $sales_product ,Request $request): RedirectResponse
    {
        \DB::beginTransaction();
        try {
            $sales_product->delete();
            \DB::commit();
            return redirect()
                ->route('mypage.index')
                ->with('success', '製品の削除が完了しました。');

        } catch (\Exception $e) {
            \DB::rollBack();
        }
        
        return redirect()
            ->back()
            ->with('alert', 'エラーが発生しました。');
        
    }

    /**
     * アカウント情報 編集
     * @return View
     */
    public function account(): View
    {
        $user = Auth::user();
        return view('web.mypage.account')->with([
            'user' => $user,
        ]);
    }
    
    /**
     * アカウント情報 更新
     *
     * @param UpdateAccountRequest $request
     * @return RedirectResponse
     */
    public function accountUpdate(updateAccountRequest $request): RedirectResponse
    {
        $user = Auth::user();
        if ($this->user_repository->accountUpdate($user, $request)) {
            return redirect()
                ->route('mypage.index', $user)
                ->with('status', 'success')
                ->with('success', '更新が完了しました。');
        } else {
            return redirect()
                ->back()
                ->with('status', 'failed')
                ->with('alert', '更新に失敗しました。');
        }
    }

    /**
     * 基本情報 編集
     * @return View
     */
    public function user(): View
    {
        $user = Auth::user();
        $prefectures = config('prefecture');

        return view('web.mypage.user')->with([
            'user' => $user,
            'prefectures' => $prefectures,
        ]);
    }
    
    /**
     * 基本情報 更新
     * @param StoreInformationRequest $request
     * @return RedirectResponse
     */
    public function userUpdate(StoreInformationRequest $request): RedirectResponse
    {
        $user = Auth::user();
        if ($this->user_repository->userUpdate($user, $request)) {
            return redirect()
            ->route('mypage.index', $user)
            ->with('status', 'success')
            ->with('success', '更新が完了しました。');
        } else {
            return redirect()
                ->back()
                ->with('status', 'failed')
                ->with('alert', '更新に失敗しました。');
        }
    }
    
    /**
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function withdrawal(): \Illuminate\Contracts\View\View|Factory|Application
    {
        return view('web.auth.leave.index');
    }
    
    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(): Redirector|RedirectResponse|Application
    {
        $user = Auth::user();
        $params = ['email' => data_get($user, 'email'), 'last_name' => data_get($user, 'last_name'), 'first_name' => data_get($user, 'first_name')];
        $this->user_repository->destroy($user);
        
        // メールの送信
        $this->sendMailService->send('withdrawal', $params, 1);
        return redirect('withdrawal/complete');
    }
    
}
