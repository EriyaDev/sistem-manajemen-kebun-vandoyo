<?php

namespace App\Filament\Resources\HarvestSchedules\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HarvestScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('orchard_id')
                    ->relationship('orchard', 'name')
                    ->required(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date'),
                Select::make('worker')
                    ->relationship('workers', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable(),
                Select::make('status')
                    ->required()
                    ->options([
                        'Terjadwal' => 'Terjadwal',
                        'Berlangsung' => 'Berlangsung',
                        'Selesai' => 'Selesai',
                        'Dibatalkan' => 'Dibatalkan',
                    ])
                    ->default('Terjadwal'),
                Textarea::make('notes'),
            ]);
    }
}
