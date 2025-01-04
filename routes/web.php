<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReviewFavoriteController;
use App\Http\Controllers\SaunaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaunaFacilityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;

// 管理者の認証機能
require __DIR__.'/auth.php';
require __DIR__.'/admin_auth.php';

//middleware('auth:admin')が必要
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {

    //管理画面トップページかつ一覧表示
    Route::get('top', [SaunaFacilityController::class, 'index'])->name('top');

    // サウナ施設管理
    Route::prefix('saunas')->name('saunas.')->group(function () {
        // サウナ施設新規登録画面
        Route::get('create', [SaunaFacilityController::class, 'create'])->name('create');
        // サウナ施設新規登録処理
        Route::post('store', [SaunaFacilityController::class, 'store'])->name('store');
        // サウナ施設編集画面表示
        Route::get('{saunaFacilityId}/edit', [SaunaFacilityController::class, 'edit'])->name('edit');
        // サウナ施設更新処理
        Route::post('{saunaFacilityId}/update', [SaunaFacilityController::class, 'update'])->name('update');
        // サウナ施設削除処理
        Route::post('{saunaFacilityId}/destroy', [SaunaFacilityController::class, 'destroy'])->name('destroy');

        // サウナ管理
        // Route::prefix('{saunaFacilityId}/types')->name('types.')->group(function () {
        //     Route::get('create', [SaunaController::class, 'create'])->name('create');
        // });
    });
});

// ユーザー画面
Route::get('/', [UserController::class, 'top'])->name('top');
// ユーザー側のサウナ一覧画面
Route::get('/index', [UserController::class, 'index'])->name('index');
// ユーザー側のサウナ詳細画面
Route::get('saunaFacilities/{saunaFacilityId}', [UserController::class, 'saunaFacilities'])->name('saunaFacilities');

// お気に入り機能
Route::middleware(['auth'])->prefix('saunaFacilities/{saunaFacilityId}/favorites')->group(function(){
    Route::post('/', [FavoriteController::class, 'store'])->name('favorites.store'); // お気に入り追加
    Route::delete('/', [FavoriteController::class, 'destroy'])->name('favorites.destroy'); // お気に入り削除
});

//口コミ投稿機能
Route::middleware(['auth'])->prefix('saunaFacilities/{saunaFacilityId}/reviews')->group(function(){
    Route::post('/',[ReviewController::class, 'store'])->name('reviews.store');
    // 口コミいいね機能
    Route::middleware(['auth'])->prefix('{reviewId}/favorites')->group(function(){
        Route::post('/', [ReviewFavoriteController::class, 'store'])->name('reviewFavorites.store');
        Route::delete('/', [ReviewFavoriteController::class, 'destroy'])->name('reviewFavorites.destroy');
    });
});

// Google認証ルート
Route::prefix('auth')->group(function(){
    Route::get('/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});
