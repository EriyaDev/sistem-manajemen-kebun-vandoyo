<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrchardHistory extends Model
{

    protected $fillable = [
        'orchard_id',
        'status',
        'start_date',
        'end_date',
        'notes',
    ];

    public function orchard():BelongsTo
    {
        return $this->belongsTo(Orchard::class);
    }
}
