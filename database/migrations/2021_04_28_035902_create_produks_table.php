<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('toko_id')->nullable();
            $table->string('nama');
            $table->string('deskripsi');
            $table->integer('jumlah')->nullable();
            $table->float('harga');
            $table->string('cover_img')->nullable();
            $table->timestamps();

            $table->foreign('toko_id')->references('id')->on('tokos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
