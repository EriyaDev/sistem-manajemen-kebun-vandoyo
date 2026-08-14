<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone_number',
        'address',
        'status',
    ];

    public function harvestSchedules(): BelongsToMany
    {
        return $this->belongsToMany(HarvestSchedule::class, 'harvest_schedule_workers');
    }

    public function burningSchedules(): BelongsToMany
    {
        return $this->belongsToMany(BurningSchedule::class, 'burning_schedule_workers');
    }

    public function spraySchedules(): BelongsToMany
    {
        return $this->belongsToMany(SpraySchedule::class, 'spray_schedule_workers');
    }
}
