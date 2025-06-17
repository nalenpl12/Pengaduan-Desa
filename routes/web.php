<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanInfrastrukturController;
use App\Http\Controllers\SaranPembangunanController;
use App\Http\Controllers\StatusAduanController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// DASHBOARD - ganti closure dengan controller
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/admin/dashboard', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('admin.dashboard');

// ROUTE YANG HANYA BISA DIAKSES SETELAH LOGIN
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
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
    Route::get('/status-aduan', [StatusAduanController::class, 'index'])->name('status.index');


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
