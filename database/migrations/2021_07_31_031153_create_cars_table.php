<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->foreignId('user_id');
            $table->string('layanan');
            $table->string('nama_pemilik');
            $table->string('no_polisi');
            $table->string('no_rangka');
            $table->string('no_mesin');
            $table->string('nama_stnk');
            $table->bigInteger('dp')->unsigned();
            $table->bigInteger('estimasi')->unsigned();
            $table->date('tanggal_terima');
            $table->longText('keterangan')->nullable();
            $table->string('status')->default('Proses');
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
        Schema::dropIfExists('cars');
    }
}
