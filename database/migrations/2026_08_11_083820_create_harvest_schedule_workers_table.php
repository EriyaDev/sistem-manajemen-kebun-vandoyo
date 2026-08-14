<?php

use App\Models\HarvestSchedule;
use App\Models\Worker;
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
        Schema::create('harvest_schedule_workers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(HarvestSchedule::class);
            $table->foreignIdFor(Worker::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harvest_schedule_workers');
    }
};
