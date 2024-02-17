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
        Schema::create('desas', function (Blueprint $table) {
            $table->id();
            $table->string('caleg');
            $table->string('desa');
            // $table->string('jlh_pemilih')->constrained('jlh_pemilih')->on('lokasis');
            $table->string('jlh_pemilih')->nullable();
            $table->string('suara')->nullable();
            $table->string('golput')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desas');
    }
};
