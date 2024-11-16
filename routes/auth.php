<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // ログイン画面表示
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    // ログイン処理
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});
//middleware('auth:web')が必要
Route::middleware('auth:web')->group(function () {
    // ログアウト処理
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
