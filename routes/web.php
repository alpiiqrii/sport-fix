<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\KasirMiddleware;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin.index');

route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
route::get('/admin/{id}', [AdminController::class, 'edit'])->name('admin.edit');
route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

Route::middleware([KasirMiddleware::class])->group(function () {
    Route::get('/kasir', [KasirController::class, 'kasir'])->name('kasir.index');
    Route::get('/kasir/penjualan', [KasirController::class, 'penjualan'])->name('kasir.penjualan');
    Route::post('/kasir/store', [KasirController::class, 'store'])->name('kasir.store');
});

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('/download-laporan-produk', [LaporanController::class, 'downloadLaporanProduk'])->name('download.laporan.produk');
Route::get('/download-laporan-kasir', [LaporanController::class, 'downloadLaporanKasir'])->name('download.laporan.kasir');



