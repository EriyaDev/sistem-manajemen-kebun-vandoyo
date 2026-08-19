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

    public function spray_schedule_garden_chemicals(){
        return $this->hasMany(SprayScheduleGardenChemical::class);
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
