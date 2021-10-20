<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('no_telp');
            $table->integer('jumlah_kamar');
            $table->date('tgl_check_in');
            $table->date('tgl_check_out');
            $table->string('nama_hotel');
            $table->string('kota_hotel');
            $table->string('negara_hotel');
            $table->string('gambar_hotel');
            $table->integer('harga');
            $table->integer('bintang_hotel');
            $table->integer('id_user');
            $table->string('fasilitas');
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
        Schema::dropIfExists('booking');
    }
}
