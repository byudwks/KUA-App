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
        Schema::create('walis', function (Blueprint $table) {
            $table->id('id_wali');
            $table->unsignedBigInteger('id_cpwanita');
            $table->foreign('id_cpwanita')->references('id_cpwanita')->on('cpwanitas');
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('hubungan');
            $table->string('agama');
            $table->string('alamat');
            $table->string('ktpimg')->nullable();
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
        Schema::dropIfExists('walis');
    }
};
