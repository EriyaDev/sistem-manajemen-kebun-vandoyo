<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orchard extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'location',
        'wide',
    ];

    protected function casts(): array
    {
        return [
            'wide' => 'decimal:2',
        ];
    }

    public function harvestSchedules(): HasMany
    {
        return $this->hasMany(HarvestSchedule::class);
    }

    public function burningSchedules(): HasMany
    {
        return $this->hasMany(BurningSchedule::class);
    }

    public function spraySchedules(): HasMany
    {
        return $this->hasMany(SpraySchedule::class);
    }
}
