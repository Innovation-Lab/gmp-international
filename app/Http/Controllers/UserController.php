<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MBrand;
use App\Models\MColor;
use App\Models\MProduct;
use App\Models\MShop;
use App\Models\SalesProduct;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\StoreInformationRequest;
use App\Http\Requests\StoreProductRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $user_repository;

    public function __construct(
        UserRepositoryInterface $user_repository
    )
    {
        $this->user_repository = $user_repository;
    }

    /**
     * ユーザー一覧
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $user = Auth::user();
        $sales_products = data_get($user, 'salesProducts');

        return view('web.mypage.index')->with([
            'user' => $user,
            'sales_products' => $sales_products,
        ]);

    }
    
    /**
     * 登録製品一覧
     * @return View
     */
    public function product(): View
    {
        $user = Auth::user();
        $sales_products = data_get($user, 'salesProducts');

        return view('web.mypage.product.index')->with([
            'user' => $user,
            'sales_products' => $sales_products,
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }

    /**
     * 登録済み製品 更新
     * @return RedirectResponse
     */
    public function update(SalesProduct $sales_product ,StoreProductRequest $request): RedirectResponse
    {
        $params = $request->all();

        try {
            $sales_product->fill($params)->save();
            \DB::commit();

            return redirect()
                ->route('mypage.product')
                ->with('message', '更新が完了しました。');

        } catch (\Exception $e) {
            \DB::rollBack();
        }

        return redirect()
            ->back()
            ->with('error', 'エラーが発生しました。');
    }

    /**
     * 登録済み製品 削除
     * @return RedirectResponse
     */
    public function productDelete(SalesProduct $sales_product ,Request $request): RedirectResponse
    {
        \DB::beginTransaction();
        try {
            $sales_product->delete();
            \DB::commit();
            return redirect()
                ->route('mypage.product')
                ->with('message', '製品の削除が完了しました。');

        } catch (\Exception $e) {
            \DB::rollBack();
        }
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
                ->with('message', '更新が完了しました。');
        } else {
            return redirect()
                ->back()
                ->with('status', 'failed')
                ->with('message', '更新に失敗しました。');
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
     * @return RedirectResponse
     */
    public function userUpdate(StoreInformationRequest $request): RedirectResponse
    {
        $user = Auth::user();
        if ($this->user_repository->userUpdate($user, $request)) {
            return redirect()
            ->route('mypage.index', $user)
            ->with('status', 'success')
            ->with('message', '更新が完了しました。');
        } else {
            return redirect()
                ->back()
                ->with('status', 'failed')
                ->with('message', '更新に失敗しました。');
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
        
        if(!$this->user_repository->destroy($user)) {
            return redirect()->back()->with(['error' => 'エラーが発生しました。お問い合わせください。']);
        }
        
        return redirect()->route('mypage.withdrawal.complete');
        
    }
    
    /**
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function withdrawalComplete(): \Illuminate\Contracts\View\View|Factory|Application
    {
        return view('web.auth.leave.complete');
    }
}
