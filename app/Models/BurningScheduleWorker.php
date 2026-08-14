<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BurningScheduleWorker extends Model
{
    protected $fillable = [
        'burning_schedule_id',
        'worker_id',
    ];

    public function burningSchedule(): BelongsTo
    {
        return $this->belongsTo(BurningSchedule::class);
    }

    public function worker(): BelongsTo
    {
        return $this->belongsTo(Worker::class);
    }
}
