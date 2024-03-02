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
        Schema::create('rekap__dapil2s', function (Blueprint $table) {
            $table->id();
            $table->string('nm_paslon')->constrained('caleg')->on('rekap_desas');
            $table->string('dapil')->constrained('dapil')->on('rekap_desas');
            $table->integer('jlh_pemilih')->nullable();
            $table->integer('jlh_suara')->nullable();
            $table->enum('validateds', ['ya', 'tidak'])->default('tidak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap__dapil2s');
    }
};
