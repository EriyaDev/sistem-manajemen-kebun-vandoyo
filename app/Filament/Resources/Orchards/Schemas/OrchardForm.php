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
                    ->required(),
                TextInput::make('location'),
                TextInput::make('wide')
                    ->numeric(),
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
