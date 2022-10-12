<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPembelianProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembelian_produk', function (Blueprint $table) {
            $table->foreign(['id_sku'], 'pembelian_produk_ibfk_1')->references(['id'])->on('sku')->onDelete('SET NULL');
            $table->foreign(['id_pembelian'], 'pembelian_produk_ibfk_2')->references(['id_pembelian'])->on('pembelian')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembelian_produk', function (Blueprint $table) {
            $table->dropForeign('pembelian_produk_ibfk_1');
            $table->dropForeign('pembelian_produk_ibfk_2');
        });
    }
}
