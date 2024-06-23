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
        Schema::create('qurban_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('monitoring_officer_id')->constrained('monitoring_officers')->onDelete('cascade');
            $table->foreignId('slaughtering_place_id')->constrained('slaughtering_places')->onDelete('cascade');
            $table->foreignId('year_id')->constrained('years');
            $table->date('date');
            $table->char('created_by',36);
            $table->char('update_by',36);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qurban_reports');
    }
};
