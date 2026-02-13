<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Default
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard Redirect Berdasarkan Role
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Dashboard utama (redirect berdasarkan role di controller)
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
            ->name('admin.dashboard');
    });

    /*
    |--------------------------------------------------------------------------
    | PETUGAS
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:petugas')->group(function () {
        Route::get('/petugas/dashboard', [DashboardController::class, 'petugas'])
            ->name('petugas.dashboard');
    });

    /*
    |--------------------------------------------------------------------------
    | MASYARAKAT
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:masyarakat')->group(function () {

        Route::get('/masyarakat/dashboard', [DashboardController::class, 'masyarakat'])
            ->name('masyarakat.dashboard');

        Route::get('/pengaduan', [PengaduanController::class, 'index'])
            ->name('pengaduan.index');

        Route::get('/pengaduan/create', [PengaduanController::class, 'create'])
            ->name('pengaduan.create');

        Route::post('/pengaduan', [PengaduanController::class, 'store'])
            ->name('pengaduan.store');
    });
});

require __DIR__.'/auth.php';
