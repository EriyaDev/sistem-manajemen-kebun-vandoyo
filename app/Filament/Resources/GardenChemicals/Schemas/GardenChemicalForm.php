<?php

namespace App\Filament\Resources\GardenChemicals\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GardenChemicalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('type')
                    ->required()
                    ->options([
                        'pestisida' => 'Pestisida',
                        'fungisida' => 'Fungisida',
                        'herbisida' => 'Herbisida',
                        'insektisida' => 'Insektisida',
                        'pupuk' => 'Pupuk',
                        'lainnya' => 'Lainnya',
                    ]),
                Select::make('unit')
                    ->required()
                    ->options([
                        'ml' => 'Mililiter',
                        'l' => 'Liter',
                        'kg' => 'Kilogram',
                        'g' => 'Gram',
                        'pcs' => 'Pieces',
                        'roll' => 'Roll',
                        'set' => 'Set',
                        'lainnya' => 'Lainnya',
                    ]),
                DatePicker::make('expired_date')
                    ->nullable(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
