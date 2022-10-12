<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->integer('id_pembelian', true);
            $table->integer('id_user')->nullable()->index('id_user');
            $table->integer('id_ongkir')->nullable()->index('id_ongkir');
            $table->date('tanggal_pembelian');
            $table->integer('total_pembelian');
            $table->text('alamat_pengiriman');
            $table->string('status_pembelian', 100)->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian');
    }
}
