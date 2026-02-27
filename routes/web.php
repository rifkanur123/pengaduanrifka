<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaPengaduanController;
use App\Http\Controllers\AdminPengaduanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| REDIRECT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::controller(AuthController::class)->group(function () {

    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerPost')->name('register.post');

    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginPost')->name('login.post');

    Route::get('/logout', 'logout')->name('logout');
});

/*
|--------------------------------------------------------------------------
| SISWA
|--------------------------------------------------------------------------
*/
Route::middleware(['loginManual', 'roleManual:siswa'])
    ->prefix('siswa')
    ->name('siswa.')
    ->group(function () {

        Route::get('/pengaduan', [SiswaPengaduanController::class, 'index'])
            ->name('pengaduan.index');

        Route::get('/pengaduan/create', [SiswaPengaduanController::class, 'create'])
            ->name('pengaduan.create');

        Route::post('/pengaduan', [SiswaPengaduanController::class, 'store'])
            ->name('pengaduan.store');

        Route::get('/pengaduan/{id}', [SiswaPengaduanController::class, 'show'])
            ->name('pengaduan.show');

        Route::get('/pengaduan/delete/{id}', [SiswaPengaduanController::class, 'delete'])
            ->name('pengaduan.delete');
});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['loginManual', 'roleManual:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/pengaduan', [AdminPengaduanController::class, 'index'])
            ->name('pengaduan.index');

        Route::get('/pengaduan/{id}', [AdminPengaduanController::class, 'show'])
            ->name('pengaduan.show');

        Route::post('/pengaduan/update/{id}', [AdminPengaduanController::class, 'update'])
            ->name('pengaduan.update');

        // ✅ TAMBAHAN ROUTE HAPUS (BIAR ADA AKSI DELETE)
        Route::delete('/pengaduan/{id}', [AdminPengaduanController::class, 'destroy'])
            ->name('pengaduan.destroy');
});