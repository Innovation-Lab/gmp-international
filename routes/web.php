<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\UserController;


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

//ホーム
// ログイン後のホーム画面
Route::get('/home', function () {
    return view('web.users.mypage.index');
});
require __DIR__.'/auth.php';

Route::get('/', [RegisterController::class, 'login'])->name('login');
Route::get('/login', [RegisterController::class, 'login'])->name('login');

//パスワード再設定メール
Route::view('/forgot', 'web.auth.forgot.index')->name('web.forgot.index');
Route::view('/forgot/complete', 'web.auth.forgot.complete')->name('web.forgot.complete');

//パスワード再設定
Route::view('/reset', 'web.auth.reset.index')->name('web.reset.index');


/* ! ==================================================
　新規会員登録
================================================== */
Route::group([
    'prefix' => 'register',
    'as' => 'register.',
], function() {
    //利用規約同意
    Route::get('/', [RegisterController::class, 'terms'])->name('terms');
    //アカウント情報入力
    Route::get('/account', [RegisterController::class, 'account'])->name('account');
    Route::post('/store/account', [RegisterController::class, 'storeAccount'])->name('store.account');
    //ユーザー情報入力
    Route::get('/info', [RegisterController::class, 'information'])->name('info');
    Route::post('/store/info', [RegisterController::class, 'storeInformation'])->name('store.information');

    //購入製品登録
    Route::get('/product', [RegisterController::class, 'product'])->name('product');
    //入力情報確認
    Route::get('/confirm', [RegisterController::class, 'confirm'])->name('confirm');
    //入力完了画面
    Route::get('/complete', [RegisterController::class, 'complete'])->name('complete');
});


/* ! ==================================================
　マイページ
================================================== */
//ホーム
Route::group([
    'namespace' => 'Mypage',
    'prefix' => 'mypage',
    'as' => 'mypage.',
], function() {
    //マイページ
    Route::get('/', [UserController::class, 'index'])->name('index');
    //登録済み製品一覧
    Route::view('/product', 'web.users.mypage.product')->name('product');
    //製品の追加登録
    Route::view('/add', 'web.users.mypage.add')->name('add');
    //製品の入力情報確認
    Route::view('/confirm', 'web.users.mypage.confirm')->name('confirm');
    //アカウント情報の編集
    Route::view('/account', 'web.users.mypage.account')->name('account');
    //基本情報の編集
    Route::view('/user', 'web.users.mypage.user')->name('user');
});