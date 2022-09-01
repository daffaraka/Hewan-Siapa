<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKontakInPostAdopsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_adopsi', function (Blueprint $table) {
            $table->string('kontak_adopsi');
        });
        Schema::table('post_pemacakan', function (Blueprint $table) {
            $table->string('kontak_pemacakan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_adopsi', function (Blueprint $table) {
            //
        });
    }
}
