<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisHewansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_hewans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_jenis_hewan')->nullable();
            $table->string('slug_jenis_hewan')->nullable();
            //JADI KITA AKAN MEMBUAT CATEGORI INI MEMILIKI ANAK KATEGORI
            //SEHINGGA DIBUAT STRUKTUR DIMANA KATEGORI YANG MEMILIKI parent_id
            //ADALAH KATEGORI ANAK, SEBALIKNYA JIKA KATEGORI ITU parent_id NYA NULL
            //MAKA DIA ADALAH KATEGORI INDUK
            $table->unsignedBigInteger('parent_id')->default(0);
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
        Schema::dropIfExists('jenis_hewans');
    }
}
