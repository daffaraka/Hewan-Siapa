<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTransaksiPemacakanTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan-transaksi-pemacakan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_post');
            $table->string('nama_owner_post');
            $table->string('jenis_hewan_post');
            $table->string('ras_hewan_post');
            $table->string('type_post');
            $table->string('nama_pengaju_pemacakan');
            $table->string('nama_hewan_pengaju');
            $table->string('jenis_hewan_pengaju');
            $table->string('ras_hewan_pengaju');
            $table->string('alamat_pengaju');
            $table->string('contact_pengaju');
            $table->string('nama_hewan_yang_dipacak');

            $table->unsignedBigInteger('post_id');
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
        //
    }
}
