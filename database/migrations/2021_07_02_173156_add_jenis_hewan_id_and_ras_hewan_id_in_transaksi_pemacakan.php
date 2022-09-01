<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenisHewanIdAndRasHewanIdInTransaksiPemacakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi_pemacakan', function (Blueprint $table) {
            $table->unsignedBigInteger('jenis_hewan_id');
            $table->unsignedBigInteger('ras_hewan_id');

            $table->foreign('jenis_hewan_id')->references('id')->on('jenis_hewans')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ras_hewan_id')->references('id')->on('ras_hewans')
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
        Schema::table('transaksi_pemacakan', function (Blueprint $table) {
            //
        });
    }
}
