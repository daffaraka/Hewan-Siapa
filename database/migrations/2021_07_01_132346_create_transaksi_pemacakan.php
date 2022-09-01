<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPemacakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pemacakan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('TM_nama_post');
            $table->string('TM_jenis_hewan_post');
            $table->string('TM_ras_hewan_post');
            $table->unsignedBigInteger('TM_nama_post_id');
            $table->string('TM_nama_owner_post');
            $table->string('TM_nama_pengaju');
            $table->string('TM_jenis_hewan_pengaju');
            $table->string('TM_ras_hewan_pengaju');
            $table->string('TM_alamat_pengaju');
            $table->string('TM_contact_pengaju');
            $table->string('TM_alasan_memilih');
            $table->string('TM_gambar');
            $table->timestamps();

            $table->foreign('TM_nama_post_id')->references('id')->on('post_pemacakan')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_pemacakan');
    }
}
