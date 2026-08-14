<?php

use App\Models\Orchard;
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
        Schema::create('burning_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Orchard::class);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('status');
            $table->string('notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('burning_schedules');
    }
};
