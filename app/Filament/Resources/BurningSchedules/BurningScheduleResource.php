<?php

namespace App\Filament\Resources\BurningSchedules;

use App\Filament\Resources\BurningSchedules\Pages\CreateBurningSchedule;
use App\Filament\Resources\BurningSchedules\Pages\EditBurningSchedule;
use App\Filament\Resources\BurningSchedules\Pages\ListBurningSchedules;
use App\Filament\Resources\BurningSchedules\Pages\ViewBurningSchedule;
use App\Filament\Resources\BurningSchedules\Schemas\BurningScheduleForm;
use App\Filament\Resources\BurningSchedules\Schemas\BurningScheduleInfolist;
use App\Filament\Resources\BurningSchedules\Tables\BurningSchedulesTable;
use App\Models\BurningSchedule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class BurningScheduleResource extends Resource
{
    protected static ?string $model = BurningSchedule::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::Fire;
    protected static string | UnitEnum | null $navigationGroup = 'Jadwal';

    public static function getModelLabel(): string
    {
        return 'Jadwal Bakar';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Jadwal Bakar';
    }

    public static function form(Schema $schema): Schema
    {
        return BurningScheduleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BurningScheduleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BurningSchedulesTable::configure($table);
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
            'index' => ListBurningSchedules::route('/'),
            'create' => CreateBurningSchedule::route('/create'),
            'view' => ViewBurningSchedule::route('/{record}'),
            'edit' => EditBurningSchedule::route('/{record}/edit'),
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
