<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKeranjangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('keranjang', function (Blueprint $table) {
            $table->foreign(['id_user'], 'keranjang_ibfk_1')->references(['id'])->on('users')->onDelete('CASCADE');
            $table->foreign(['id_sku'], 'keranjang_ibfk_2')->references(['id'])->on('sku')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keranjang', function (Blueprint $table) {
            $table->dropForeign('keranjang_ibfk_1');
            $table->dropForeign('keranjang_ibfk_2');
        });
    }
}
