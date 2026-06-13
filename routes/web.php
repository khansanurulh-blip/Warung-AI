<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\TransaksiController;

Route::get('/', [DashboardController::class, 'index']);

Route::resource('barang', BarangController::class);

Route::get('/import', [ImportController::class, 'index']);

Route::post('/import', [ImportController::class, 'upload']);

Route::get('/transaksi', [TransaksiController::class, 'index']);