<?php

namespace App\Filament\Resources\Umkms\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UmkmInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_umkm'),
                TextEntry::make('nama_pemilik'),
                TextEntry::make('deskripsi')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('alamat')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('whatsapp'),
                TextEntry::make('foto')
                    ->placeholder('-'),
                TextEntry::make('slug'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
