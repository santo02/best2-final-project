<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketplaces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tingkat_keberhasilan');
            $table->string('nama_perusahaan');
            $table->string('industri');
            $table->string('jumlah_pinjaman');
            $table->string('pinjaman_terkumpul');
            $table->string('metode_pengembalian');
            $table->string('jatuh_tempo');
            $table->string('jangka_waktu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marketplaces');
    }
};
