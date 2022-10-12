<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sku', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_produk')->index('id_produk');
            $table->enum('ukuran', ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'All Size', 'Normal']);
            $table->integer('stok');
            $table->string('warna', 40);
            $table->string('kode_warna', 40);

            $table->unique(['id'], 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sku');
    }
}
