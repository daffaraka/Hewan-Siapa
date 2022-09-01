<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan-transaksi-adopsi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('LTA_nama_post');
            $table->string('LTA_nama_owner_post');
            $table->string('LTA_nama_pengaju');
            $table->string('LTA_jenis_hewant');
            $table->string('LTA_ras_hewan');
            $table->string('LTA_type_post');
            $table->string('LTA_alamat_pengaju');
            $table->string('LTA_contact_pengaju');
            $table->string('LTA_alasan_memilih');

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
