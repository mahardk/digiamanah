<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\ProdukPublicController;

Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm.index');
Route::get('/umkm/{slug}', [UmkmController::class, 'show'])->name('umkm.show');

Route::view('/', 'home')->name('home');

Route::get('/produk', [ProdukPublicController::class, 'index'])->name('produk.index');
Route::get('/produk/{slug}', [ProdukPublicController::class, 'show'])->name('produk.show');
