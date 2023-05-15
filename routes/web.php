<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\RegisterController;
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
    return view('web.home');
});
require __DIR__.'/auth.php';

//製品一覧
Route::view('/mypage/product', 'web.mypage.product')->name('web.product');

//購入製品登録
Route::view('/register/product', 'web.register.product')->name('web.register.product');

//入力情報確認
Route::view('/register/confirm', 'web.register.confirm')->name('web.register.confirm');

//入力完了画面
Route::view('/register/complete', 'web.register.complete')->name('web.register.complete');

/* ! ==================================================
　マイページ
================================================== */

Route::view('/mypage', 'web.mypage.index')->name('web.mypage');

Route::get('/', [RegisterController::class, 'login'])->name('login');
Route::get('/login', [RegisterController::class, 'login'])->name('login');

//新規会員登録
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

//ホーム
Route::group([
    'namespace' => 'Mypage',
    'prefix' => 'mypage',
    'as' => 'mypage.',
], function() {
    Route::get('/', [UserController::class, 'index'])->name('index');
});
