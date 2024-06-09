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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('monitoring_officer_id')->constrained('monitoring_officers');
            $table->foreignId('slaughtering_place_id')->constrained('slaughtering_places');
            $table->integer('jumlah_penugasan');
            $table->char('created_by',36);
            $table->char('update_by',36);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
