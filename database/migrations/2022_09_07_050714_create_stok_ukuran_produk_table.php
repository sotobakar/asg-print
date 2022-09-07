<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokUkuranProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_ukuran_produk', function (Blueprint $table) {
            $table->bigIncrements('id')->unique('id');
            $table->integer('id_produk');
            $table->enum('ukuran', ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'All Size', 'Normal']);
            $table->integer('stok');
            $table->string('warna', 40);
            $table->string('kode_warna', 40);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_ukuran_produk');
    }
}
