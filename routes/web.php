<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaunaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaunaFacilityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 管理者の認証機能
require __DIR__.'/auth.php';


//管理画面トップページかつ一覧表示
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
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
// ユーザー側のサウナ詳細画面
Route::get('saunaFacilities/{saunaFacilityId}', [UserController::class, 'saunaFacilities'])->name('saunaFacilities');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
