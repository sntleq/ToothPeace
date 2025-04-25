<?php

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
        Schema::create('availability_override', function (Blueprint $table) {
            $table->id();
            $table->enum('day_of_week', range(0, 6));
            $table->time('start_time');
            $table->time('end_time');
            $table->foreignId('dentist_id')->constrained('dentists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availability_override');
    }
};
