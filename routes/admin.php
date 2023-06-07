<?php

use App\Http\Controllers\Admin\MasterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| 管理画面
|--------------------------------------------------------------------------
|
*/

Route::group([
    'as' => 'admin.'
], function () {
    // ログイン
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
    });
     Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::group(['middleware' => 'auth:admin'], function () {
        // ダッシュボード
        /**
         * todo ダッシュボードページを作成してください。
         */
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/chartUserRegister', [HomeController::class, 'chartUserRegister']);
        Route::get('/home', [HomeController::class, 'index'])->name('index');
        
        // ユーザー
        Route::group([
            'namespace' => 'User',
            'prefix' => 'user',
            'as' => 'users.',
        ], function() {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::get('/create-products/{user}', [UserController::class, 'createProducts'])->name('create-products');
            Route::get('/detail/{user}', [UserController::class, 'detail'])->name('detail');
            Route::get('/edit-user/{user}', [UserController::class, 'editUser'])->name('edit-user');
            Route::post('/user-update/{user}', [UserController::class, 'updateUser'])->name('update-user');
            Route::get('/edit-products/{sales_product}', [UserController::class, 'editProducts'])->name('edit-products');
            Route::post('/update-products/{sales_product}', [UserController::class, 'updateProducts'])->name('update-products');
            // Route::get('/detail/userEdit', [ProductController::class, 'userEdit'])->name('userEdit');
        });
        
        // 登録製品管理
        Route::group([
            'namespace' => 'Product',
            'prefix' => 'product',
            'as' => 'products.',
        ], function() {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/create-products', [UserController::class, 'createProducts'])->name('create-products');
            Route::get('/detail', [ProductController::class, 'detail'])->name('detail');
            Route::get('/edit', [ProductController::class, 'edit'])->name('edit-products');
        });
        
        // マスタ
        Route::group([
            'namespace' => 'Master',
            'prefix' => 'masters',
            'as' => 'masters.',
        ], function() {
            //ブランドマスタ
            Route::get('/brand', [MasterController::class, 'brand'])->name('brand');
            Route::get('/brand/edit', [MasterController::class, 'brandEdit'])->name('brand.edit');
            Route::get('/brand/create', [MasterController::class, 'brandCreate'])->name('brand.create');
            //製品マスタ
            Route::get('/product', [MasterController::class, 'product'])->name('product');
            Route::get('/product/detail', [MasterController::class, 'productDetail'])->name('product.detail');
            Route::get('/product/edit', [MasterController::class, 'productEdit'])->name('product.edit');
            Route::get('/product/create', [MasterController::class, 'productCreate'])->name('product.create');
            //店舗マスタ
            Route::get('/store', [MasterController::class, 'store'])->name('store');
            Route::get('/store/edit', [MasterController::class, 'storeEdit'])->name('store.edit');
            Route::get('/store/detail', [MasterController::class, 'storeDetail'])->name('store.detail');
            Route::get('/store/create', [MasterController::class, 'storeCreate'])->name('store.create');
            //カラーマスタ
            Route::get('/color', [MasterController::class, 'color'])->name('color');
            Route::get('/color/edit', [MasterController::class, 'colorEdit'])->name('color.edit');
            Route::get('/color/create', [MasterController::class, 'colorCreate'])->name('color.create');
        });
        
        // アカウント
        Route::group([
            'namespace' => 'Staff',
            'prefix' => 'staff',
            'as' => 'staffs.',
        ], function() {
            Route::get('/', [AdminController::class, 'index'])->name('index');
            Route::get('/create', [AdminController::class, 'create'])->name('create');
            Route::get('/edit', [AdminController::class, 'edit'])->name('edit');
        });
    });

    
});

//ユーザー情報詳細
Route::view('/admin/userShow', 'admin.users.detail.index')->name('admin-users');