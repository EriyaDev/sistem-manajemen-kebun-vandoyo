<?php

use App\Models\GardenChemical;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('garden_chemical_price_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(GardenChemical::class);
            $table->integer('price')->default(0);
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garden_chemical_price_histories');
    }
};
