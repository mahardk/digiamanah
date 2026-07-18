<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class ProdukPublicController extends Controller
{
    public function index()
    {
        $produks = Produk::with(['umkm', 'kategori'])->latest()->paginate(12);

        return view('produk.index', compact('produks'));
    }

    public function show(string $slug)
    {
        $produk = Produk::with(['umkm', 'kategori'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('produk.show', compact('produk'));
    }
}