<?php

use App\Models\GardenChemical;
use App\Models\SpraySchedule;
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
        Schema::create('spray_schedule_garden_chemical', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SpraySchedule::class);
            $table->foreignIdFor(GardenChemical::class);
            $table->integer('dose');
            $table->string('unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spray_schedule_garden_chemical');
    }
};
