<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesProductController;

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
//退会完了
Route::view('/withdrawal/complete', 'web.auth.leave.complete');


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
    
    // ajax
    Route::get('js-get-array', [RegisterController::class, 'jsGetArray']);
    Route::get('js-get-tying-array', [RegisterController::class, 'jsGetTyingArray']);
    Route::get('js-search-serial', [RegisterController::class, 'jsSearchSerial']);
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
        Route::post('/update/{sales_product}', [UserController::class, 'update'])->name('update');

        //登録済み製品の削除
        Route::post('/delete/{sales_product}', [UserController::class, 'productDelete'])->name('product.delete');

        //製品の追加登録
        Route::get('/add', [SalesProductController::class, 'product'])->name('add');
        Route::post('/add', [SalesProductController::class, 'productAdd'])->name('add');
        
        Route::get('/js-get-tying-array', [SalesProductController::class, 'jsGetTyingArray']);
        Route::get('/js-search-serial', [SalesProductController::class, 'jsSearchSerial']);
        
        //製品の入力情報確認
        Route::get('/confirm', [SalesProductController::class, 'productConfirm'])->name('confirm');
        Route::post('/store', [SalesProductController::class, 'store'])->name('store');

        //アカウント情報編集
        Route::get('/account', [UserController::class, 'account'])->name('account');
        Route::post('/account', [UserController::class, 'accountUpdate'])->name('account');

        //基本情報編集
        Route::get('/user', [UserController::class, 'user'])->name('user');
        Route::post('/user', [UserController::class, 'userUpdate'])->name('user');
        
        //退会の手続き
        Route::get('/user/withdrawal', [UserController::class, 'withdrawal'])->name('withdrawal');
        Route::post('/user/destroy', [UserController::class, 'destroy'])->name('destroy');
        //退会完了
    });

});