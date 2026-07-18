<?php

namespace App\Filament\Resources\Produks\Schemas;

use App\Models\Kategori;
use App\Models\Umkm;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProdukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('nama_produk')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn (string $state, callable $set) =>
                    $set('slug', Str::slug($state))
                ),

            TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true)
                ->disabled()
                ->dehydrated(),

            Select::make('umkm_id')
                ->label('UMKM')
                ->options(Umkm::pluck('nama_umkm', 'id'))
                ->searchable()
                ->required(),

            Select::make('kategori_id')
                ->label('Kategori')
                ->options(Kategori::pluck('nama', 'id'))
                ->searchable()
                ->required(),

            TextInput::make('harga')
                ->required()
                ->numeric()
                ->prefix('Rp'),

            Textarea::make('deskripsi')
                ->rows(4)
                ->columnSpanFull(),

            FileUpload::make('foto')
                ->disk('public')
                ->image()
                ->directory('produk')
                ->imageEditor()
                ->columnSpanFull(),
        ]);
    }
}