<?php

namespace App\Filament\Resources\Orchards\Schemas;

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
            ]);
    }
}
