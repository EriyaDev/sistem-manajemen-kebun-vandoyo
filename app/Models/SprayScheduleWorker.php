<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SprayScheduleWorker extends Model
{
    protected $fillable = [
        'spray_schedule_id',
        'worker_id',
    ];

    public function spraySchedule(): BelongsTo
    {
        return $this->belongsTo(SpraySchedule::class);
    }

    public function worker(): BelongsTo
    {
        return $this->belongsTo(Worker::class);
    }
}
