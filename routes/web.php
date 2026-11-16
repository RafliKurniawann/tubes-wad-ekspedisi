<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EkspedisiController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// 'auth' di luar, 'role' di dalam: auth harus berjalan sebelum role
Route::middleware('auth')->group(function () {
    Route::get('/', fn () => redirect()->route('ekspedisi.index'));

    // Lihat daftar: semua role yang sudah login
    Route::resource('ekspedisi', EkspedisiController::class)->only(['index']);

    // Tambah & ubah: admin dan operator
    Route::middleware('role:admin,operator')->group(function () {
        Route::resource('ekspedisi', EkspedisiController::class)
            ->only(['create', 'store', 'edit', 'update']);
    });

    // Hapus: admin saja
    Route::middleware('role:admin')->group(function () {
        Route::resource('ekspedisi', EkspedisiController::class)->only(['destroy']);
    });
});