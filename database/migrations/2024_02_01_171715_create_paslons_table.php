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
            $table->enum('nama_partai', ['1 - PKB','2 - GERINDRA','3 - PDIP','4 - GOLKAR', '5 - NASDEM', '6 - PARTAI BURUH', '7 - GELORA','8 - PKS','9 - PKN','10 - HANURA','11 - GARUDA','12 - PAN','13 - PBB','14 - DEMOKRAT','15 - PSI','16 - PERINDO','17 - PPP'])->default('17 - PPP');
            // $table->string('nama_partai')->constrained('nm_partai')->on('partais');
            $table->string('nama_paslon');
            $table->string('no_urut');
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
