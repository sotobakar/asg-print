<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sku', function (Blueprint $table) {
            $table->foreign(['id_produk'], 'sku_ibfk_1')->references(['id_produk'])->on('produk')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sku', function (Blueprint $table) {
            $table->dropForeign('sku_ibfk_1');
        });
    }
}
