<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Umkm extends Model
    {protected $fillable = [
        'nama_umkm',
        'nama_pemilik',
        'kategori_usaha',
        'badge',
        'is_verified',
        'deskripsi',
        'alamat',
        'whatsapp',
        'foto',
        'foto_gallery',
        'slug',
    ];

    protected $casts = [
        'foto_gallery' => 'array',
        'is_verified' => 'boolean',
    ];

    public function produks(): HasMany
    {
        return $this->hasMany(Produk::class);
    }
}