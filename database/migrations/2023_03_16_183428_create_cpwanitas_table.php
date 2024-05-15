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
        Schema::create('cpwanitas', function (Blueprint $table) {
            $table->id('id_cpwanita');
            $table->unsignedBigInteger('id_cppria');
            $table->foreign('id_cppria')->references('id_cppria')->on('cpprias');
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('warganegara');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('umur');
            $table->string('status');
            $table->string('agama');
            $table->string('pendidikan');
            $table->string('alamat');
            $table->string('pasimg')->nullable();
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
        Schema::dropIfExists('cpwanitas');
    }
};
