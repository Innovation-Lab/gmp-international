<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/* ! ==================================================
　画面名 (マイページとか登録画面とか)
================================================== */
//ホーム
Route::view('/', 'web.auth.login');

// 認証
// Route::get('/', 'HomeController@index')->name('home');