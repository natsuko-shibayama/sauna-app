<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaunaFacilityController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';


//管理画面トップページかつ一覧表示
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('top', [SaunaFacilityController::class, 'index'])->name('top');

    // サウナ管理
    Route::prefix('saunas')->name('saunas.')->group(function () {
        // サウナ施設新規登録画面
        Route::get('create', [SaunaFacilityController::class, 'create'])->name('create');
        // サウナ施設新規登録処理
        Route::post('store', [SaunaFacilityController::class, 'store'])->name('store');
        // サウナ施設編集画面表示
        Route::get('{saunaId}/edit', [SaunaFacilityController::class, 'edit'])->name('edit');
        // サウナ施設更新処理
        Route::post('{saunaId}/update', [SaunaFacilityController::class, 'update'])->name('update');
        // サウナ施設削除処理
        Route::post('{saunaId}/destroy', [SaunaFacilityController::class, 'destroy'])->name('destroy');
    });
});
