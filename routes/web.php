<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukPublicController;

Route::view('/', 'home')->name('home');

Route::get('/produk', [ProdukPublicController::class, 'index'])->name('produk.index');
Route::get('/produk/{slug}', [ProdukPublicController::class, 'show'])->name('produk.show');
