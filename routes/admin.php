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
    // Route::get('logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'auth:admin'], function () {
        // ダッシュボード
        /**
         * todo ダッシュボードページを作成してください。
         */
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/home', [HomeController::class, 'index'])->name('index');
        
        // ユーザー
        Route::group([
            'namespace' => 'User',
            'prefix' => 'user',
            'as' => 'users.',
        ], function() {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/detail', [UserController::class, 'index'])->name('detail');
        });
        
        // 商品管理
        Route::group([
            'namespace' => 'Product',
            'prefix' => 'product',
            'as' => 'products.',
        ], function() {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/detail', [ProductController::class, 'detail'])->name('detail');
        });
        
        // マスタ
        Route::group([
            'namespace' => 'Master',
            'prefix' => 'masters',
            'as' => 'masters.',
        ], function() {
            Route::get('/', [MasterController::class, 'index'])->name('index');
        });
        
        // アカウント
        Route::group([
            'namespace' => 'Staff',
            'prefix' => 'staff',
            'as' => 'staffs.',
        ], function() {
            Route::get('/', [AdminController::class, 'index'])->name('index');
        });
    });
});

