<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HarvestSchedule extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'orchard_id',
        'start_date',
        'end_date',
        'status',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function orchard(): BelongsTo
    {
        return $this->belongsTo(Orchard::class);
    }

    public function workers(): BelongsToMany
    {
        return $this->belongsToMany(Worker::class, 'harvest_schedule_workers');
    }
}
