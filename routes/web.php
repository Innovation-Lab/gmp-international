<?php

/* ! ==================================================
　画面名 (マイページとか登録画面とか)
================================================== */

//新規会員登録
// Route::view('/register', 'register')->name('register');

//ホーム
Route::view('/', 'web.home')->name('home');

//ログイン
Route::view('/login', 'web.auth.login')->name('login');

//マイページ
Route::view('/mypage', 'web.mypage.index')->name('mypage');


//新規会員登録
//利用規約同意
Route::view('/register', 'web.register.terms')->name('terms');
//アカウント情報入力
Route::view('/register/account', 'web.register.account')->name('account');
//ユーザー情報入力
Route::view('/register/user', 'web.register.user')->name('user');
//購入製品登録
Route::view('/register/product', 'web.register.product')->name('product');
//入力情報確認
Route::view('/register/confirm', 'web.register.confirm')->name('confirm');
//入力完了画面
Route::view('/register/complete', 'web.register.complete')->name('complete');