<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class GardenChemical extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'unit',
        'notes',
    ];

    public function spraySchedules(): BelongsToMany
    {
        return $this->belongsToMany(SpraySchedule::class, 'spray_schedule_garden_chemical')
            ->using(SprayScheduleGardenChemical::class)
            ->withPivot('dose', 'unit');
    }

    public function price_histories(): HasMany
    {
        return $this->hasMany(GardenChemicalPriceHistory::class);
    }

    public function latest_price()
    {
        return $this->price_histories()->latest()->first();
    }
}
