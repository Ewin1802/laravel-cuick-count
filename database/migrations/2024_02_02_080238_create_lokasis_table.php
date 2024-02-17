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
        Schema::create('lokasis', function (Blueprint $table) {
            $table->id();
            $table->string('nm_desa');
            $table->enum('nm_kec', ['Pinogaluman','Kaidipang','Bolangitang Barat','Bolangitang Timur', 'Bintauna', 'Sangkub'])->default('Bolangitang Barat');
            $table->enum('dapil', ['DAPIL I','DAPIL II','DAPIL III']);
            $table->string('jlh_tps');
            $table->string('jlh_DPT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasis');
    }
};
