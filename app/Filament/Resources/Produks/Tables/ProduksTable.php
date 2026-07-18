<?php

namespace App\Filament\Resources\Produks\Tables;

use App\Models\Kategori;
use App\Models\Umkm;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Actions\Action;

class ProduksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->disk('public')
                    ->square(),

                TextColumn::make('nama_produk')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('umkm.nama_umkm')
                    ->label('UMKM')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kategori.nama')
                    ->label('Kategori')
                    ->badge(),

                TextColumn::make('harga')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('umkm_id')
                    ->label('UMKM')
                    ->options(Umkm::pluck('nama_umkm', 'id')),

                SelectFilter::make('kategori_id')
                    ->label('Kategori')
                    ->options(Kategori::pluck('nama', 'id')),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('downloadQr')
                    ->label('Download QR')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn ($record) => $record->qr_code ? asset('storage/' . $record->qr_code) : null)
                    ->openUrlInNewTab()
                    ->visible(fn ($record) => filled($record->qr_code)),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}