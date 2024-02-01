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
        Schema::create('paslons', function (Blueprint $table) {
            $table->id();
            $table->string('partai');
            $table->string('no_urut');
            $table->string('nama_paslon');
            $table->enum('nm_desa', ['Sonuo','Langi','Iyok','Tote']);
            $table->enum('tps', ['1','2','3','4']);
            $table->enum('nm_kec', ['Pinogaluman','Kaidipang','Bolbar','Boltim', 'Bintauna', 'Sangkub']);
            $table->integer('jlh_pemilih');
            $table->integer('jlh_suara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paslons');
    }
};
