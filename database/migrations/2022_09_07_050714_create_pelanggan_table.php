<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->integer('id_pelanggan', true);
            $table->string('email_pelanggan', 100);
            $table->string('password_pelanggan', 50);
            $table->string('nama_pelanggan', 100);
            $table->string('telepon_pelanggan', 25);
            $table->text('alamat_pelanggan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggan');
    }
}
