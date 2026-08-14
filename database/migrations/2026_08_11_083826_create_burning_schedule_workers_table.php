<?php

use App\Models\BurningSchedule;
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
        Schema::create('burning_schedule_workers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BurningSchedule::class);
            $table->foreignIdFor(Worker::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('burning_schedule_workers');
    }
};
