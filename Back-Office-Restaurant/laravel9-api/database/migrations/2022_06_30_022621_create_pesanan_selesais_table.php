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
        Schema::create('pesanan_selesai', function (Blueprint $table) {
            $table->id('id_pesanan_selesai');
            $table->biginteger('id_tiket')->unsigned();
            $table->timestamps();
        });

        Schema::table('pesanan_selesai', function (Blueprint $table) {
            $table->foreign('id_tiket')->references('id_tiketpesanan')->on('tiket_pesanan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan_selesai');
    }
};
