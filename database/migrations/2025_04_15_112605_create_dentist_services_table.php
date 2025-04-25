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
        Schema::create('dentist_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dentist_id')->constrained('dentists');
            $table->foreignId('appointment_type_id')->constrained('appointment_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentist_services');
    }
};
