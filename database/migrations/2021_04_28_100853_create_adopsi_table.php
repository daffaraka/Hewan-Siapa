<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdopsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_adopsi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_post_adopsi');
            $table->string('owner-adopsi-name');
            $table->unsignedBigInteger('owner-adopsi_id');
            $table->string('nama_jenis_hewan')->nullable();
            $table->unsignedBigInteger('jenis_hewan_id');
            $table->string('nama_ras_hewan')->nullable(); 
            $table->unsignedBigInteger('ras_hewan_id');
            $table->string('jenis_post');
            $table->string('deskripsi_post_adps');
            $table->string('lokasi_post_adps');
            $table->string('syarat_adopsi')->nullable();
            $table->string('size-file')->nullable();
            $table->string('image_post_adps')->nullable();
            $table->integer('status_adopsi');

        
            $table->timestamps();

            $table->foreign('jenis_hewan_id')->references('id')->on('jenis_hewans')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ras_hewan_id')->references('id')->on('ras_hewans')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('owner-adopsi_id')->references('id')->on('users')
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
        Schema::dropIfExists('adopsi');
    }
}
