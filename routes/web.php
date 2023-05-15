<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* ! ==================================================
　ログイン
================================================== */

//新規会員登録
// Route::view('/register', 'register')->name('register');

//ホーム
// ログイン後のホーム画面
Route::get('/home', function () {
    return view('web.home');
});
require __DIR__.'/auth.php';



//ログイン
Route::view('/login', 'web.auth.login')->name('web.login');



//マイページ
Route::view('/mypage', 'web.mypage.index')->name('web.mypage');

//登録済み製品一覧
Route::view('/mypage/product', 'web.mypage.product')->name('web.product');



//新規会員登録

//利用規約同意
Route::view('/register', 'web.register.terms')->name('web.register.terms');

//アカウント情報入力
Route::view('/register/account', 'web.register.account')->name('web.register.account');

//ユーザー情報入力
Route::view('/register/user', 'web.register.user')->name('web.register.user');

//購入製品登録
Route::view('/register/product', 'web.register.product')->name('web.register.product');

//入力情報確認
Route::view('/register/confirm', 'web.register.confirm')->name('web.register.confirm');

//入力完了画面
Route::view('/register/complete', 'web.register.complete')->name('web.register.complete');

