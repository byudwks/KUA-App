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
        Schema::table('cpprias', function (Blueprint $table) {
            $table->unsignedBigInteger('id_akad')->after('id_cppria');
            $table->foreign('id_akad')->references('id_akad')->on('akads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cpprias', function (Blueprint $table) {
            $table->dropForeign('cpprias_id_akad_foreign');
            $table->dropColumn('id_akad');
        });
    }
};
