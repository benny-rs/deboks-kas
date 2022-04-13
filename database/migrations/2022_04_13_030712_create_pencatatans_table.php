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
        Schema::create('pencatatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_warung');
            $table->foreignId('id_user');
            $table->integer('produk_terbeli');
            $table->integer('pemasukan');
            $table->integer('pengeluaran');
            $table->integer('minggu_ke');
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
        Schema::dropIfExists('pencatatans');
    }
};
