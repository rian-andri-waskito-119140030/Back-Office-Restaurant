<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('menu', function (Blueprint $table) {
            $table->id('id_menu');
            $table->string('gambar');
            $table->string('nama_menu');
            $table->string('tipe_produk');
            $table->integer('harga_modal');
            $table->integer('harga_jual');
            $table->integer('stok');
            $table->text('deskripsi');
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
        Schema::dropIfExists('menu');
    }
};
