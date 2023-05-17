<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
    public function index()
    {
        return view('web.mypage.index');
    }

}
