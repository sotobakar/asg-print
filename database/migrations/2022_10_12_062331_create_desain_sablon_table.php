<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesainSablonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desain_sablon', function (Blueprint $table) {
            $table->integer('id_desain_sablon', true);
            $table->string('jenis_produk', 10);
            $table->string('desain_depan')->nullable();
            $table->string('desain_belakang')->nullable();
            $table->string('letak_sablon', 20);
            $table->string('catatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desain_sablon');
    }
}
