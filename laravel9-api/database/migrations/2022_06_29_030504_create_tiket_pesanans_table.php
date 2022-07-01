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
        Schema::create('tiket_pesanan', function (Blueprint $table) {
            $table->id('id_tiketpesanan');
            $table->biginteger('id')->unsigned();
            $table->string('status_pesanan');
            $table->timestamps();
        });

        Schema::table('tiket_pesanan', function (Blueprint $table) {
            $table->foreign('id')->references('id_pesanan')->on('pesanan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiket_pesanan');
    }
};
