<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembelian', function (Blueprint $table) {
            $table->foreign(['id_ongkir'], 'pembelian_ibfk_1')->references(['id_ongkir'])->on('ongkir')->onDelete('SET NULL');
            $table->foreign(['id_user'], 'pembelian_ibfk_2')->references(['id'])->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembelian', function (Blueprint $table) {
            $table->dropForeign('pembelian_ibfk_1');
            $table->dropForeign('pembelian_ibfk_2');
        });
    }
}
