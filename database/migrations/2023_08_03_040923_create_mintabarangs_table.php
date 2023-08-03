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
        Schema::create('mintabarangs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('keperluan_proyek');
            $table->string('lokasi_proyek');
            $table->string('kode');
            $table->string('nama_kagudang');
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
        Schema::dropIfExists('mintabarangs');
    }
};
