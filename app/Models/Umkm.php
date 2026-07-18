<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Umkm extends Model
{
    protected $fillable = [
        'nama_umkm',
        'nama_pemilik',
        'deskripsi',
        'alamat',
        'whatsapp',
        'foto',
        'slug',
    ];

    public function produks(): HasMany
    {
        return $this->hasMany(Produk::class);
    }
}