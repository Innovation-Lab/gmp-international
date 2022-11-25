<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\MyProfileController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\NewsController;

use App\Http\Controllers\Admin\Auth\PasswordResetLinkController as AdminPasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\NewPasswordController as AdminNewPasswordController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\NewPasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// リダイレクト
Route::get('/', function () {
    return redirect('/admin');
});


// ログイン
Route::view('/admin/auth/login', 'admin.auth.login')->name('admin.auth.login');

// ホーム
Route::view('/admin', 'admin.home')->name('admin.home');
Route::view('/item', 'admin.item')->name('admin.item');
Route::view('/sales', 'admin.sales')->name('admin.sales');
Route::view('/user', 'admin.user')->name('admin.user');
Route::view('/news', 'admin.news')->name('admin.news');
Route::view('/contact', 'admin.contact')->name('admin.contact');
Route::view('/master', 'admin.master')->name('admin.master');


// スタイルガイド
Route::view('/admin/styleguide', 'admin.styleguide')->name('admin.styleguide');


