<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\AdminController;

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
| Semua Route Setelah Login
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Redirect dashboard berdasarkan role
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

        Route::post('/admin/verifikasi/{id}', 
            [AdminController::class, 'verifikasi'])
            ->name('admin.verifikasi');
    });

    /*
    |--------------------------------------------------------------------------
    | PETUGAS
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:petugas')->group(function () {

        Route::get('/petugas/dashboard', [DashboardController::class, 'petugas'])
            ->name('petugas.dashboard');

        Route::get('/tanggapan/create/{id}', 
            [TanggapanController::class, 'create'])
            ->name('tanggapan.create');

        Route::post('/tanggapan/store/{id}', 
            [TanggapanController::class, 'store'])
            ->name('tanggapan.store');
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
