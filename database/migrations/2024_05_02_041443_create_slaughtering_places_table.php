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
        Schema::create('slaughtering_places', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->constrained('users');
            $table->foreignId('type_of_place_id')->constrained('type_of_places');
            $table->foreignId('provinsi_id')->constrained('ref_provinsi');
            $table->foreignId('kabupaten_id')->constrained('ref_kabupaten_kota');
            $table->foreignId('kecamatan_id')->constrained('ref_kecamatan');
            $table->foreignId('kelurahan_id')->constrained('ref_kelurahan');
            $table->string('cutting_place')->nullable();
            $table->string('address')->nullable();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->char('created_by', 36);
            $table->char('update_by', 36);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slaughtering_places');
    }
};
