<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GardenChemicalPriceHistory extends Model
{
    protected $fillable = [
        'price',
        'date',
    ];

    public function garden_chemical(): BelongsTo
    {
        return $this->belongsTo(GardenChemical::class);
    }

    static function price_average(){
        return self::query()->avg('price');
    }

    static function last_month_price_average(){
        return self::query()->avg('price')->whereMonth('date', now()->subMonth()->month)->whereYear('date', now()->subMonth()->year);
    }
}
