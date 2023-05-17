<?php

use App\Http\Controllers\Admin\MasterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| 管理画面
|--------------------------------------------------------------------------
|
*/

Route::group([
    'as' => 'admin.'
], function () {
    // ダッシュボード
    /**
     * todo ダッシュボードページを作成してください。
     */
    Route::view('/', 'admin.auth.login')->name('home');

    // ログイン
    Route::view('/auth/login', 'admin.auth.login')->name('auth.login');
    
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

