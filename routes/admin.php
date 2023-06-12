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
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/create/products/{user}', [UserController::class, 'createProducts'])->name('create-products');
            Route::post('/store-products/{user}', [UserController::class, 'storeProducts'])->name('store-products');
            Route::get('/detail/{user}', [UserController::class, 'detail'])->name('detail');
            Route::get('/edit-user/{user}', [UserController::class, 'editUser'])->name('edit-user');
            Route::post('/user-update/{user}', [UserController::class, 'updateUser'])->name('update-user');
            Route::post('/destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
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
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
            Route::get('/detail/{product}', [ProductController::class, 'detail'])->name('detail');
            Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
            Route::post('/update/{product}', [ProductController::class, 'update'])->name('update');
            Route::post('/destroy/{product}', [ProductController::class, 'destroy'])->name('destroy');
        });
        
        // マスタ
        Route::group([
            'namespace' => 'Master',
            'prefix' => 'masters',
            'as' => 'masters.',
        ], function() {
            //ブランドマスタ
            Route::get('/brand', [MasterController::class, 'brand'])->name('brand');
            Route::get('/brand/edit/{brand}', [MasterController::class, 'brandEdit'])->name('brand.edit');
            Route::get('/brand/create', [MasterController::class, 'brandCreate'])->name('brand.create');
            Route::post('/brand/updateOrCreate', [MasterController::class, 'brandUpdateOrCreate'])->name('brand.updateOrCreate');
            Route::post('/brand/delete/{brand}', [MasterController::class, 'brandDelete'])->name('brand.delete');
            //製品マスタ
            Route::get('/product', [MasterController::class, 'product'])->name('product');
            Route::get('/product/detail/{product}', [MasterController::class, 'productDetail'])->name('product.detail');
            Route::get('/product/edit/{product}', [MasterController::class, 'productEdit'])->name('product.edit');
            Route::get('/product/create', [MasterController::class, 'productCreate'])->name('product.create');
            Route::post('/product/updateOrCreate', [MasterController::class, 'productUpdateOrCreate'])->name('product.updateOrCreate');
            Route::post('/product/color/delete', [MasterController::class, 'productColorDelete'])->name('product.color.delete');
            Route::post('/product/delete/{product}', [MasterController::class, 'productDelete'])->name('product.delete');
            //店舗マスタ
            Route::get('/store', [MasterController::class, 'store'])->name('store');
            Route::get('/store/detail/{shop}', [MasterController::class, 'storeDetail'])->name('store.detail');
            Route::get('/store/edit/{shop}', [MasterController::class, 'storeEdit'])->name('store.edit');
            Route::get('/store/create', [MasterController::class, 'storeCreate'])->name('store.create');
            Route::post('/store/updateOrCreate', [MasterController::class, 'storeUpdateOrCreate'])->name('store.updateOrCreate');
            Route::post('/store/delete/{store}', [MasterController::class, 'storeDelete'])->name('store.delete');
            
            //カラーマスタ
            Route::get('/color', [MasterController::class, 'color'])->name('color');
            Route::get('/color/edit/{color}', [MasterController::class, 'colorEdit'])->name('color.edit');
            Route::get('/color/create', [MasterController::class, 'colorCreate'])->name('color.create');
            Route::post('/color/updateOrCreate', [MasterController::class, 'colorUpdateOrCreate'])->name('color.updateOrCreate');
            Route::post('/color/delete/{color}', [MasterController::class, 'colorDelete'])->name('color.delete');
        });
        
        // アカウント
        Route::group([
            'namespace' => 'Staff',
            'prefix' => 'staff',
            'as' => 'staffs.',
        ], function() {
            Route::get('/', [AdminController::class, 'index'])->name('index');
            Route::get('/create', [AdminController::class, 'create'])->name('create');
            Route::get('/edit/{admin}', [AdminController::class, 'edit'])->name('edit');
            Route::post('/delete/{admin}', [AdminController::class, 'delete'])->name('delete');
            Route::post('/updateOrCreate', [AdminController::class, 'updateOrCreate'])->name('updateOrCreate');
        });
    });

    
});

//ユーザー情報詳細
Route::view('/admin/userShow', 'admin.users.detail.index')->name('admin-users');