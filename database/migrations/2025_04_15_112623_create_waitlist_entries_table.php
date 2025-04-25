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
        Schema::create('waitlist_entries', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at');
            $table->date('date');
            $table->time('time_start');
            $table->time('time_end');
            $table->enum('status', ['waiting', 'notified']);
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('dentist_id')->constrained('dentists');
            $table->foreignId('appointment_type_id')->constrained('appointment_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waitlist_entries');
    }
};
