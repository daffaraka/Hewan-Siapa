<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRasHewansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ras_hewans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_ras_hewan')->nullable();
            $table->unsignedBigInteger('jenis_hewan_id')->nullable();
            $table->string('parent_ras_jenis_hewan')->nullable();
            $table->timestamps();
            
            $table->foreign('jenis_hewan_id')->references('id')->on('jenis_hewans');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ras_hewans');
    }
}
