<?php

namespace App\Filament\Resources\Orchards\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class OrchardsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('Nama Kebun'),
                TextColumn::make('location')
                    ->searchable()
                    ->label('Lokasi'),
                TextColumn::make('wide')
                    ->numeric()
                    ->sortable()
                    ->suffix(' m²')
                    ->label('Luas Kebun'),
                TextColumn::make('apple_variant')
                    ->searchable()
                    ->label('Jenis Apel'),
                TextColumn::make('population_total')
                    ->numeric()
                    ->sortable()
                    ->label('Total Pohon')
                    ->suffix(' pohon'),
            ])
            ->filters([
                // TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                //     ForceDeleteBulkAction::make(),
                //     RestoreBulkAction::make(),
                // ]),
            ]);
    }
}
