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

// ダッシュボード
Route::view('/admin', 'admin.dashboard.index')->name('admin.home');

// 商品管理
Route::view('/admin/item', 'admin.item.index')->name('admin.item');
Route::view('/admin/sales', 'admin.sales.index')->name('admin.sales');

Route::view('/admin/user', 'admin.user.index')->name('admin.user');
Route::view('/admin/user/detail', 'admin.user.detail')->name('admin.user.detail');

Route::view('/admin/news', 'admin.news.index')->name('admin.news');
Route::view('/admin/contact', 'admin.contact.index')->name('admin.contact');
Route::view('/admin/master', 'admin.master.index')->name('admin.master');

Route::view('/admin/account', 'admin.account.profile')->name('admin.account.profile');
Route::view('/admin/account/edit', 'admin.account.edit')->name('admin.account.edit');
Route::view('/admin/account/mail', 'admin.account.mail')->name('admin.account.mail');
Route::view('/admin/account/password', 'admin.account.password')->name('admin.account.password');

Route::view('/admin/account/admin', 'admin.account.admin.index')->name('admin.account.admin.index');
Route::view('/admin/account/admin/edit', 'admin.account.admin.edit')->name('admin.account.admin.edit');
Route::view('/admin/account/admin/add', 'admin.account.admin.add')->name('admin.account.admin.add');


// スタイルガイド
Route::view('/admin/styleguide', 'admin.styleguide')->name('admin.styleguide');


