<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AprioriController;

Route::get('/', [DashboardController::class, 'index']);

Route::resource('barang', BarangController::class);

Route::get('/import', [ImportController::class, 'index']);

Route::post('/import', [ImportController::class, 'upload']);

Route::get('/transaksi', [TransaksiController::class, 'index']);

Route::get('/transaksi/create', [TransaksiController::class, 'create']);

Route::post('/transaksi', [TransaksiController::class, 'store']);

Route::get('/transaksi/{transaksi}', [TransaksiController::class, 'show']);

Route::get('/apriori', [AprioriController::class, 'index']);

Route::delete('/transaksi/{transaksi}', [TransaksiController::class, 'destroy']);
