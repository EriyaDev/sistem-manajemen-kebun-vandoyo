<?php

namespace App\Filament\Resources\HarvestSchedules;

use App\Filament\Resources\HarvestSchedules\Pages\CreateHarvestSchedule;
use App\Filament\Resources\HarvestSchedules\Pages\EditHarvestSchedule;
use App\Filament\Resources\HarvestSchedules\Pages\ListHarvestSchedules;
use App\Filament\Resources\HarvestSchedules\Pages\ViewHarvestSchedule;
use App\Filament\Resources\HarvestSchedules\Schemas\HarvestScheduleForm;
use App\Filament\Resources\HarvestSchedules\Schemas\HarvestScheduleInfolist;
use App\Filament\Resources\HarvestSchedules\Tables\HarvestSchedulesTable;
use App\Models\HarvestSchedule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class HarvestScheduleResource extends Resource
{
    protected static ?string $model = HarvestSchedule::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::Calendar;

    protected static string | UnitEnum | null $navigationGroup = 'Jadwal';

    public static function getModelLabel(): string
    {
        return 'Jadwal Panen';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Jadwal Panen';
    }

    public static function form(Schema $schema): Schema
    {
        return HarvestScheduleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HarvestScheduleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HarvestSchedulesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHarvestSchedules::route('/'),
            'create' => CreateHarvestSchedule::route('/create'),
            'view' => ViewHarvestSchedule::route('/{record}'),
            'edit' => EditHarvestSchedule::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
