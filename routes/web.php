<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\WearLogController;
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

    Route::resource('item', ItemController::class)->only(['index', 'create', 'store']);
    Route::resource('item', ItemController::class)->except(['index', 'create', 'store'])->middleware('item_owner');

    Route::post('wear-log/store/{item}', [WearLogController::class, 'store'])->name('wear-log.store')->middleware('item_owner');
    Route::delete('wear-log/{wear_log}', [WearLogController::class, 'destroy'])->name('wear-log.destroy')->middleware('wear_log_owner');
    Route::get('wear-log/{item}', [WearLogController::class, 'getWearDates']);
    Route::post('wear-log/update/{item}', [WearLogController::class, 'updateWearLogs']);

    Route::get('stat', [StatController::class, 'index'])->name('stat.index');
    Route::get('stat/unused-item', [StatController::class, 'unusedItem'])->name('stat.unused-item');
    Route::get('stat/wear-rank', [StatController::class, 'wearRank'])->name('stat.wear-rank');

    // 一括操作用のAPIエンドポイント
    Route::post('wear-logs/bulk', [WearLogController::class, 'bulkStore']);
    Route::post('wear-logs/bulk-delete', [WearLogController::class, 'bulkDestroy']);
    Route::post('items/bulk-delete', [ItemController::class, 'bulkDestroy']);
});

require __DIR__.'/auth.php';
