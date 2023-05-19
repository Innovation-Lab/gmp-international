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

class UserController extends Controller
{
    /**
     * ユーザー一覧
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('web.mypage.index');
    }
    
    /**
     * 登録製品一覧
     * @return View
     */
    public function product(): View
    {
        return view('web.mypage.product.index');
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

    //基本情報編集
    public function user()
    {
        return view('web.mypage.user');
    }

    //アカウント情報編集
    public function account()
    {
        return view('web.mypage.account');
    }

}
