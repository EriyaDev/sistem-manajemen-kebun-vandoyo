<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SprayScheduleGardenChemical extends Model
{
    protected $table = 'spray_schedule_garden_chemical';

    protected $fillable = [
        'spray_schedule_id',
        'garden_chemical_id',
        'dose',
        'unit',
    ];

    public function spray_schedule()
    {
        return $this->belongsTo(SpraySchedule::class);
    }

    public function garden_chemical()
    {
        return $this->belongsTo(GardenChemical::class);
    }
}
