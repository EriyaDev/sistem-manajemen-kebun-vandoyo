<?php

namespace App\Filament\Resources\Workers\Schemas;

use App\Models\Worker;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class WorkerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('phone_number'),
                TextEntry::make('address'),
                TextEntry::make('status'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Worker $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
