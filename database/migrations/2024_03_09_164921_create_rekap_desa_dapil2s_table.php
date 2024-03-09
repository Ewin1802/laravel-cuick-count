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
        Schema::create('rekap_desa_dapil2s', function (Blueprint $table) {
            $table->id();
            $table->string('caleg');
            $table->string('desa');
            $table->string('dapil')->nullable();
            $table->string('partai');
            $table->string('jlh_pemilih')->nullable();
            $table->string('suara')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_desa_dapil2s');
    }
};
