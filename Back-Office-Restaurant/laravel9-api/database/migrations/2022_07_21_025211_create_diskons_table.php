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
        Schema::create('diskon', function (Blueprint $table) {
            $table->id('id_diskon');
            $table->biginteger('id_menu')->unsigned();
            $table->string('nama_diskon');
            $table->float('diskon');

            $table->timestamps();
        });

        Schema::table('diskon', function (Blueprint $table) {
            $table->foreign('id_menu')->references('id_menu')->on('menu')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diskons');
    }
};
