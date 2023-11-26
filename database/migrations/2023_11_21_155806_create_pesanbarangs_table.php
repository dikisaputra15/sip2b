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
        Schema::create('pesanbarangs', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pesan');
            $table->integer('id_supplier');
            $table->string('nama_pemesan');
            $table->string('email_pemesan');
            $table->string('alamat_pemesan');
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
        Schema::dropIfExists('pesanbarangs');
    }
};
