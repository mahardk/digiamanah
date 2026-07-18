<?php

namespace App\Filament\Resources\Produks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;

class ProdukInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('umkm.nama_umkm')
                    ->label('UMKM'),
                TextEntry::make('kategori.nama')
                    ->label('Kategori'),
                TextEntry::make('nama_produk'),
                TextEntry::make('slug'),
                TextEntry::make('harga')
                    ->numeric(),
                TextEntry::make('deskripsi')
                    ->placeholder('-')
                    ->columnSpanFull(),

                ImageEntry::make('foto')
                    ->disk('public'),

                ImageEntry::make('qr_code')
                    ->label('QR Code')
                    ->disk('public'),

                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}