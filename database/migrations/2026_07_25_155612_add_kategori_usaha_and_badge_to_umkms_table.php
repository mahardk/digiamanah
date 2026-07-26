<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('umkms', function (Blueprint $table) {
            $table->string('kategori_usaha')->nullable()->after('nama_pemilik');
            $table->enum('badge', ['favorit', 'terlaris'])->nullable()->after('kategori_usaha');
        });
    }

    public function down(): void
    {
        Schema::table('umkms', function (Blueprint $table) {
            $table->dropColumn(['kategori_usaha', 'badge']);
        });
    }
};