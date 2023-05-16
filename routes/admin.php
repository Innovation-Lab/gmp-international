<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| 管理画面
|--------------------------------------------------------------------------
|
*/
// ダッシュボード
/**
 * todo ダッシュボードページを作成してください。
 */
Route::view('/admin', 'admin.auth.login')->name('admin.dashboard');

// ログイン
Route::view('/admin/auth/login', 'admin.auth.login')->name('admin.auth.login');
Route::view('/admin/auth/reset', 'admin.auth.reset')->name('admin.auth.reset');
Route::view('/admin/auth/reissue', 'admin.auth.reissue')->name('admin.auth.reissue');

// 商品管理
Route::view('/admin/item', 'admin.item.index')->name('admin.item');
Route::view('/admin/item/detail', 'admin.item.detail')->name('admin.item.detail');
Route::view('/admin/item/add', 'admin.item.add')->name('admin.item.add');
Route::view('/admin/item/edit', 'admin.item.edit')->name('admin.item.edit');

// 注文
Route::view('/admin/sales', 'admin.sales.index')->name('admin.sales');

// ユーザー
Route::view('/admin/user', 'admin.users.index')->name('admin.users.index');
Route::view('/admin/user/detail', 'admin.users.detail')->name('admin.users.detail');

Route::view('/admin/contact', 'admin.contact.index')->name('admin.contact');
Route::view('/admin/master', 'admin.master.index')->name('admin.master');

// アカウント
Route::view('/admin/account', 'admin.account.profile')->name('admin.account.profile');
Route::view('/admin/account/edit', 'admin.account.edit')->name('admin.account.edit');
Route::view('/admin/account/mail', 'admin.account.mail')->name('admin.account.mail');
Route::view('/admin/account/password', 'admin.account.password')->name('admin.account.password');

Route::view('/admin/account/admin', 'admin.account.admin.index')->name('admin.account.admin.index');
Route::view('/admin/account/admin/edit', 'admin.account.admin.edit')->name('admin.account.admin.edit');
Route::view('/admin/account/admin/add', 'admin.account.admin.add')->name('admin.account.admin.add');

