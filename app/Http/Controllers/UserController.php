<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * ユーザー一覧
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $user = Auth::user();

        if(Auth::user()->is_catalog == 1 ) {
            $catalog_request = '希望する';
        } else {
            $catalog_request = '希望しない';
        }

        if(Auth::user()->is_dm == 1 ) {
            $dm_request = '希望する';
        } else {
            $dm_request = '希望しない';
        }

        return view('web.mypage.index')->with([
            'user' => $user, 'catalog_request' => $catalog_request, 'dm_request' => $dm_request,
        ]);

    }
    
    /**
     * 登録製品一覧
     * @return View
     */
    public function product(): View
    {
        $user = Auth::user();
        
        return view('web.mypage.product.index')->with([
            'user' => $user,
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
     * 製品追加登録
     * @return View
     */
    public function productConfirm(): View
    {
        return view('web.mypage.product.confirm');
    }
    
    /**
     * 基本情報編集
     * @return View
     */
    public function user(): View
    {
        return view('web.mypage.user');
    }

    //アカウント情報編集
    public function account()
    {
        return view('web.mypage.account');
    }

}
