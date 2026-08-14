<?php

namespace App\Filament\Resources\GardenChemicals\Schemas;

use App\Models\GardenChemical;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class GardenChemicalInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('type'),
                TextEntry::make('unit'),
                TextEntry::make('notes')
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (GardenChemical $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
