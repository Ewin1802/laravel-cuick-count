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
        Schema::create('ds1__dalapulitimurs', function (Blueprint $table) {
            $table->id();
            $table->string('nm_caleg')->constrained('nama_paslon')->on('paslons');
            $table->string('nm_partai')->constrained('nama_partai')->on('paslons');
            $table->string('dapil')->default('DAPIL I');
            $table->string('desa')->default('Dalapuli_Timur');
            //jumlah suara di tps
             $table->integer('tps_1')->default(0);
             $table->integer('tps_2')->default(0);
             $table->integer('tps_3')->default(0);
             $table->integer('tps_4')->default(0);
             $table->integer('tps_5')->default(0);
             $table->integer('tps_6')->default(0);
             $table->integer('tps_7')->default(0);
             $table->integer('tps_8')->default(0);
             $table->integer('tps_9')->default(0);
             $table->integer('tps_10')->default(0);
             $table->integer('tps_11')->default(0);
             $table->integer('tps_12')->default(0);
             $table->integer('jlh_suara')->default(0);
             $table->string('user')->nullable();
             $table->enum('validateds', ['ya', 'tidak'])->default('tidak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ds1__dalapulitimurs');
    }
};
