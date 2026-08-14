<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HarvestScheduleWorker extends Model
{
    protected $fillable = [
        'harvest_schedule_id',
        'worker_id',
    ];

    public function harvestSchedule(): BelongsTo
    {
        return $this->belongsTo(HarvestSchedule::class);
    }

    public function worker(): BelongsTo
    {
        return $this->belongsTo(Worker::class);
    }
}
