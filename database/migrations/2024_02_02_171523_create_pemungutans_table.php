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
        Schema::create('pemungutans', function (Blueprint $table) {
            $table->id();
             //paslon_id
             $table->foreignId('paslon_id')->constrained('paslons')->onDelete('cascade');
             //lokasi_id
             $table->foreignId('lokasi_id')->constrained('lokasis')->onDelete('cascade');

            //jumlah suara di tps
             $table->integer('tps_1')->nullable();
             $table->integer('tps_2')->nullable();
             $table->integer('tps_3')->nullable();
             $table->integer('jlh_suara')->nullable();
             //validateds (ya, tidak)
             $table->enum('validateds', ['ya', 'tidak'])->default('tidak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemungutans');
    }
};
