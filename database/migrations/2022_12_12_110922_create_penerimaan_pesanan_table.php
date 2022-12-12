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
        Schema::create('penerimaan_pesanan', function (Blueprint $table) {
            $table->integer('id_pembelian')->primary();
            $table->foreign('id_pembelian')->references('id_pembelian')->on('pembelian');
            $table->boolean('dibaca')->default(0);
            $table->timestamp('waktu_diterima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penerimaan_pesanan');
    }
};
