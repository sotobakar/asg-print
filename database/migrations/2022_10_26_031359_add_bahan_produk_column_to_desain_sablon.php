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
        Schema::table('desain_sablon', function (Blueprint $table) {
            $table->string('bahan_produk')->default('Cotton Combed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('desain_sablon', function (Blueprint $table) {
            $table->dropColumn('bahan_produk');
        });
    }
};
