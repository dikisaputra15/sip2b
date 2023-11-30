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
        Schema::create('ambilbarangs', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_ambil');
            $table->string('nama_kagudang');
            $table->string('keperluan_proyek');
            $table->string('lokasi_proyek');
            $table->string('nama_pengambil');
            $table->string('keterangan');
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
        Schema::dropIfExists('ambilbarangs');
    }
};
