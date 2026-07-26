<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index(Request $request)
    {
        $query = Umkm::query();

        if ($request->filled('cari')) {
            $query->where('nama_umkm', 'like', '%' . $request->cari . '%');
        }

        if ($request->filled('kategori')) {
            $query->where('kategori_usaha', $request->kategori);
        }

        $umkms = $query->latest()->paginate(10)->withQueryString();

        $kategoriList = Umkm::whereNotNull('kategori_usaha')
            ->distinct()
            ->pluck('kategori_usaha');

        return view('umkm.index', compact('umkms', 'kategoriList'));
    }

    public function show(string $slug)
    {
        $umkm = Umkm::with('produks')->where('slug', $slug)->firstOrFail();

        return view('umkm.show', compact('umkm'));
    }
}