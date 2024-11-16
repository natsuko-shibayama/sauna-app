<?php

use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware('guest:admin')->group(function () {
        // 管理者ログイン画面表示
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
                    ->name('login');

        // 管理者ログイン処理
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });
    Route::middleware('auth:admin')->group(function () {
        // 管理者ログアウト処理
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                    ->name('logout');
    });
});
