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
        Schema::create('qurban_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qurban_report_id')->constrained('qurban_reports');
            $table->foreignId('type_of_qurban_id')->constrained('type_of_qurbans');
            $table->enum('gender', ['Jantan', 'Betina']);
            $table->float('weight');
            $table->string('disease')->nullable();
            $table->decimal('price', 10, 2);
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
        Schema::dropIfExists('qurban_data');
    }
};
