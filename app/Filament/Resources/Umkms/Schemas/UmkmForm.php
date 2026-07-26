<?php

namespace App\Filament\Resources\Umkms\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class UmkmForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('nama_umkm')
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

            TextInput::make('nama_pemilik')
                ->required()
                ->maxLength(255),

            TextInput::make('whatsapp')
                ->required()
                ->tel()
                ->maxLength(20)
                ->helperText('Format: 62812xxxxxxx (tanpa tanda + atau spasi)'),

            Textarea::make('alamat')
                ->required()
                ->rows(3)
                ->columnSpanFull(),

            Textarea::make('deskripsi')
                ->rows(4)
                ->columnSpanFull(),

            FileUpload::make('foto')
                ->disk('public')
                ->image()
                ->directory('umkm')
                ->imageEditor()
                ->columnSpanFull(),
            
            Select::make('kategori_usaha')
                ->label('Kategori Usaha')
                ->options([
                    'Kuliner' => 'Kuliner',
                    'Snack' => 'Snack',
                    'Minuman' => 'Minuman',
                    'Kerajinan' => 'Kerajinan',
                    'Fashion' => 'Fashion',
                ])
                ->searchable()
                ->required(),

            Select::make('badge')
                ->label('Badge (opsional)')
                ->options([
                    'favorit' => 'Favorit',
                    'terlaris' => 'Terlaris',
                ])
                ->placeholder('Tidak ada'),
        ]);
    }
}