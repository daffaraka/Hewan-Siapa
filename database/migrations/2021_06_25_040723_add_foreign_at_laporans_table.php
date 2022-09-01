<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignAtLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laporan-transaksi-pemacakan', function (Blueprint $table) {
          
            $table->foreign('post_id')->references('id')->on('post_pemacakan')
                  ->onDelete('cascade')->onUpdate('cascade');
            
        });
        Schema::table('laporan-transaksi-adopsi', function (Blueprint $table) {
          
            $table->foreign('post_id')->references('id')->on('post_adopsi')
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
        
    }
}
