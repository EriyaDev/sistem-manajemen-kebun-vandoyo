<?php

namespace App\Filament\Resources\Orchards\Schemas;

use App\Models\Orchard;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OrchardInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('location')
                    ->placeholder('-'),
                TextEntry::make('wide')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Orchard $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
