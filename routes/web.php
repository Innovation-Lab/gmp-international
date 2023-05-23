<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\UserController;

require __DIR__.'/auth.php';

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
    Route::post('/store/product', [RegisterController::class, 'storeProduct'])->name('store.product');
    //入力情報確認
    Route::get('/confirm', [RegisterController::class, 'confirm'])->name('confirm');
    //基本情報登録
    Route::post('/store/variable', [RegisterController::class, 'storeVariable'])->name('store.variable');
    //入力完了画面
    Route::get('/complete', [RegisterController::class, 'complete'])->name('complete');
    
    // ajaxマスタ配列取得用
    Route::get('js-get-array', [RegisterController::class, 'jsGetArray']);
});

/* ! ==================================================
　マイページ
================================================== */
Route::middleware(['auth:web'])->group(function () {
    
    // ホーム
    Route::get('/mypage', [UserController::class, 'index']);
    
    Route::group([
        'namespace' => 'Mypage',
        'prefix' => 'mypage',
        'as' => 'mypage.',
    ], function() {
        Route::get('/', [UserController::class, 'index'])->name('index');

        Route::get('/product', [UserController::class, 'productsList'])->name('index');
        
        //登録済み製品一覧
        Route::get('/product', [UserController::class, 'product'])->name('product');
        //製品の追加登録
        Route::get('/add', [UserController::class, 'productAdd'])->name('add');
        //製品の入力情報確認
        Route::get('/confirm', [UserController::class, 'productConfirm'])->name('confirm');
        
        //アカウント情報編集
        Route::get('/account/{user}', [UserController::class, 'account'])->name('account');
        Route::post('/account/{user}', [UserController::class, 'accountUpdate'])->name('account');
        //基本情報編集
        Route::get('/user/{user}', [UserController::class, 'user'])->name('user');
        Route::post('/user/{user}', [UserController::class, 'userUpdate'])->name('user');
    });

});