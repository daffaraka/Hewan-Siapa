<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiAdopsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_adopsi', function (Blueprint $table) {
            $table->bigIncrements('trans_adopsi_id');
            $table->string('TA_nama_post');
            $table->unsignedBigInteger('TA_nama_post_id');
            $table->string('TA_nama_owner_post');
            $table->string('TA_nama_pengaju');
            $table->string('TA_jenis_hewan');
            $table->string('TA_ras_hewan');
            $table->string('TA_alamat_pengaju');
            $table->string('TA_contact_pengaju');
            $table->string('TA_alasan_memilih');
            $table->string('TA_gambar');
            $table->string('TA_path-storage');
            
            $table->foreign('TA_nama_post_id')->references('id')->on('post_adopsi')
                  ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('transaksi_adopsi');
    }
}
