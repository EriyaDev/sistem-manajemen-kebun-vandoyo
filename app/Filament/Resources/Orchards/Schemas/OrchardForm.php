<?php

namespace App\Filament\Resources\Orchards\Schemas;

use App\Models\Orchard;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrchardForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('Nama Kebun'),
                TextInput::make('location')
                    ->label('Lokasi')
                    ->placeholder('Contoh: Jl. Apel No. 1'),
                TextInput::make('wide')
                    ->numeric()
                    ->label('Luas (m²)')
                    ->placeholder('Contoh: 100'),
                TextInput::make('apple_variant')
                    ->nullable()
                    ->label('Jenis Apel yang di Tanam')
                    ->placeholder('Contoh: Rome Beauty, Manalagi, dll'),
                TextInput::make('population_total')
                    ->nullable()
                    ->numeric()
                    ->label('Jumlah Pohon')
                    ->placeholder('Contoh: 100'),
                Select::make('latest_status')
                    ->options([
                        'tanaman_baru' => 'Tanaman Baru',
                        'berbunga' => 'Berbunga',
                        'berbuah' => 'Berbuah',
                    ])
                    ->default(fn (?Orchard $record) => $record?->orchard_histories()->latest()->first()?->status)
                    ->formatStateUsing(fn ($state, ?Orchard $record) => $state ?? $record?->orchard_histories()->latest()->first()?->status),
                DatePicker::make('latest_status_date')
                    ->default(fn (?Orchard $record) => $record?->orchard_histories()->latest()->first()?->start_date)
                    ->formatStateUsing(fn ($state, ?Orchard $record) => $state ?? $record?->orchard_histories()->latest()->first()?->start_date),
            ]);
    }
}
