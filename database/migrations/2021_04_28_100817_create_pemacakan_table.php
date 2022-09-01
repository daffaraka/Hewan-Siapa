<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemacakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_pemacakan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_post_pemacakan');
            $table->string('owner-pemacakan-name');
            $table->unsignedBigInteger('owner-pemacakan_id');
            $table->string('nama_jenis_hewan')->nullable();
            $table->unsignedBigInteger('jenis_hewan_id');
            $table->string('nama_ras_hewan')->nullable(); 
            $table->unsignedBigInteger('ras_hewan_id');
            $table->string('jenis_post');
            $table->string('deskripsi_post_pm');
            $table->string('lokasi_post_pm');
            $table->string('syarat_pemacakan')->nullable();
            $table->string('image_post_pm');
            $table->boolean('status_pm');

            
            $table->timestamps();

           
            $table->foreign('jenis_hewan_id')->references('id')->on('jenis_hewans')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ras_hewan_id')->references('id')->on('ras_hewans')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('owner-pemacakan_id')->references('id')->on('users')
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
        Schema::dropIfExists('pemacakan');
    }
}
