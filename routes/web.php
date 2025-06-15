<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanInfrastrukturController;
use App\Http\Controllers\SaranPembangunanController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// DASHBOARD - ganti closure dengan controller
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ROUTE YANG HANYA BISA DIAKSES SETELAH LOGIN
Route::middleware(['auth'])->group(function () {
    // Profil
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');


    // Form pengaduan
    Route::get('/pengaduan/create', [PengaduanInfrastrukturController::class, 'create'])->name('pengaduan.create');
    Route::post('/pengaduan/store', [PengaduanInfrastrukturController::class, 'store'])->name('pengaduan.store');
    Route::get('/pengaduan', [PengaduanInfrastrukturController::class, 'index'])->name('pengaduan.index');
    Route::delete('/pengaduan/{id}', [PengaduanInfrastrukturController::class, 'destroy'])->name('pengaduan.destroy');
    Route::get('/pengaduan/{id}/edit', [PengaduanInfrastrukturController::class, 'edit'])->name('pengaduan.edit');
    Route::put('/pengaduan/{id}', [PengaduanInfrastrukturController::class, 'update'])->name('pengaduan.update');

    // Form saran pembangunan
    Route::get('/saran/create', [SaranPembangunanController::class, 'create'])->name('saran.create');
    Route::post('/saran/store', [SaranPembangunanController::class, 'store'])->name('saran.store');
    Route::get('/saran', [SaranPembangunanController::class, 'index'])->name('saran.index');
    Route::get('/saran/{id}/edit', [SaranPembangunanController::class, 'edit'])->name('saran.edit');
    Route::put('/saran/{id}', [SaranPembangunanController::class, 'update'])->name('saran.update');
    Route::delete('/saran/{id}', [SaranPembangunanController::class, 'destroy'])->name('saran.destroy');


});

// AUTH routes (login, register, dsb)
require __DIR__ . '/auth.php';
