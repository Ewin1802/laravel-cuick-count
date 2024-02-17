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

             $table->string('nm_paslon')->constrained('nama_paslon')->on('paslons');
             $table->string('lokasi_id')->constrained('id')->on('lokasis');
             $table->string('nm_dapil')->constrained('nm_desa')->on('lokasis');
             $table->integer('suara')->nullable();
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
