<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->foreign(['id_pembelian'], 'pembayaran_ibfk_1')->references(['id_pembelian'])->on('pembelian')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropForeign('pembayaran_ibfk_1');
        });
    }
}
