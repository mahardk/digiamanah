<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Umkm;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukPublicController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::with(['umkm', 'kategori']);

        if ($request->filled('cari')) {
            $query->where('nama_produk', 'like', '%' . $request->cari . '%');
        }

        if ($request->filled('umkm')) {
            $query->whereHas('umkm', function ($q) use ($request) {
                $q->where('slug', $request->umkm);
            });
        }

        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        $produks = $query->latest()->paginate(12)->withQueryString();

        $umkmList = Umkm::orderBy('nama_umkm')->get(['id', 'slug', 'nama_umkm']);
        $kategoriList = Kategori::orderBy('nama')->get(['id', 'nama']);

        return view('produk.index', compact('produks', 'umkmList', 'kategoriList'));
    }

    public function show(string $slug)
    {
        $produk = Produk::with(['umkm', 'kategori'])
            ->where('slug', $slug)
            ->firstOrFail();

        $produkLain = Produk::where('umkm_id', $produk->umkm_id)
            ->where('id', '!=', $produk->id)
            ->latest()
            ->take(5)
            ->get();

        return view('produk.show', compact('produk', 'produkLain'));
    }
}