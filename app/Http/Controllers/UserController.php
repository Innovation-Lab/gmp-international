<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\StoreInformationRequest;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
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
        
        if(Auth::user()->is_catalog == 1) {
            $catalog_request = '希望する';
        } else {
            $catalog_request = '希望しない';
        }

        if(Auth::user()->is_dm == 1) {
            $dm_request = '希望する';
        } else {
            $dm_request = '希望しない';
        }

        return view('web.mypage.index')->with([
            'user' => $user,
            'catalog_request' => $catalog_request,
            'dm_request' => $dm_request,
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
        ]);
    }
    
    /**
     * 製品追加登録
     * @return View
     */
    public function productAdd(): View
    {
        return view('web.mypage.product.add');
    }
    
    /**
     * 製品追加登録 確認
     * @return View
     */
    public function productConfirm(): View
    {
        return view('web.mypage.product.confirm');
    }

    /**
     * アカウント情報 編集
     * @return View
     */
    public function account()
    {
        $user = Auth::user();
        return view('web.mypage.account')->with([
            'user' => $user,
        ]);
    }

    /**
     * アカウント情報 更新
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function accountUpdate(User $user, updateAccountRequest $request)
    {
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
     * @return View
     */
    public function userUpdate(User $user, StoreInformationRequest $request)
    {
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
}
