<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukPublicController;

Route::get('/produk', [ProdukPublicController::class, 'index'])->name('produk.index');
Route::get('/produk/{slug}', [ProdukPublicController::class, 'show'])->name('produk.show');

Route::get('/', function () {
    return view('welcome');
});
