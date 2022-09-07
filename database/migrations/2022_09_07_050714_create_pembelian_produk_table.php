<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian_produk', function (Blueprint $table) {
            $table->integer('id_pembelian_produk', true);
            $table->integer('id_pembelian');
            $table->integer('id_produk');
            $table->integer('jumlah');
            $table->string('nama', 100);
            $table->integer('harga');
            $table->integer('subharga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian_produk');
    }
}
