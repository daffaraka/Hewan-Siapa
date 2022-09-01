<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnToNullableInTransaksiAdopsi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi_adopsi', function (Blueprint $table) {
            $table->bigIncrements('trans_adopsi_id')->nullable()->change();
            $table->string('TA_nama_post',100)->nullable()->change();
            $table->unsignedBigInteger('TA_nama_post_id')->nullable()->change();
            $table->string('TA_nama_owner_post',100)->nullable()->change();
            $table->string('TA_nama_pengaju',100)->nullable()->change();
            $table->string('TA_jenis_hewan',100)->nullable()->change();
            $table->string('TA_ras_hewan',100)->nullable()->change();
            $table->string('TA_alamat_pengaju',100)->nullable()->change();
            $table->string('TA_contact_pengaju',100)->nullable()->change();
            $table->string('TA_alasan_memilih',100)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nullable_in_transaksi_adopsi', function (Blueprint $table) {
            //
        });
    }
}
