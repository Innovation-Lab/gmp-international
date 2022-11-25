<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ReserveController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\Auth\PasswordResetLinkController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\NotificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// ログインAPI
Route::post('/login', [LoginController::class, 'login']);
Route::get('/login', [LoginController::class, 'secondLogin']);

// 電話番号かメールアドレスでユーザの存在確認
Route::get('/isExists', [LoginController::class, 'isExists']);
// パスワードリセットメール送信(ログインできない人が使うやつです)
Route::get('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');


// トークン認証必要なAPI
Route::middleware('auth:sanctum')->group( function () {
    Route::get('/reservation/{id?}', [ReserveController::class, 'get']);
    Route::post('/reservation', [ReserveController::class, 'store']);
    Route::put('/reservation/{id}', [ReserveController::class, 'update']);
    Route::delete('/reservation/{id}', [ReserveController::class, 'delete']);

    // 認証通ったユーザー取得
    Route::get('/user', [LoginController::class, 'get']);
    // ユーザー情報更新
    Route::put('/user', [LoginController::class, 'update']);
    // ユーザー退会
    Route::delete('/user', [LoginController::class, 'delete']);

    // 車両CRUD
    Route::get('/car/{car_id?}', [CarController::class, 'get']);
    Route::post('/car', [CarController::class, 'add']);
    Route::put('/car/{car_id?}', [CarController::class, 'update']);
    Route::delete('/car/{car_id?}', [CarController::class, 'delete']);
    // 車両画像パス取得API
    Route::get('/catalog/photo', [CarController::class, 'getPhotoName']);

    // お気に入りCRUD
    Route::get('/favorite/{type?}/{code?}', [FavoriteController::class, 'get']);
    Route::post('/favorite/{type?}/{code?}', [FavoriteController::class, 'add']);
    Route::get('/v2/favorite/{type?}/{code?}', [FavoriteController::class, 'get2']);
    Route::post('/v2/favorite/{type?}/{code?}', [FavoriteController::class, 'add2']);
    //Route::put('/favorite/{type?}/{code?}', [favoriteController::class, 'update']);
    //Route::delete('/favorite/{type?}/{code?}', [FavoriteController::class, 'delete']);

    //Route::get('favorite/isExists/{type?}/{code?}', [FavoriteController::class, 'isExists']);

    // お知らせ取得API
    Route::get('/news', [NotificationController::class, 'get']);
    Route::get('/news/detail', [NotificationController::class, 'detail']);
    // お知らせ既読API
    Route::post('/news/read', [NotificationController::class, 'read']);
 });

/**
 * テスト用
 */
Route::get('/login_ano', [LoginController::class, 'loginAnonymous']);
Route::get('/login_ano_update', [LoginController::class, 'updateIdToken']);

