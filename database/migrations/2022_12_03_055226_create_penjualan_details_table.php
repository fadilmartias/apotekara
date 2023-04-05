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
        Schema::create('penjualan_details', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi');
            $table->foreignId('obat_id')->constrained();
            $table->integer('harga');
            $table->integer('diskon')->nullable();
            $table->integer('qty');
            $table->integer('total_harga');
            $table->timestamps();

            $table->foreign('no_transaksi')->references('no_transaksi')->on('penjualans');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan_details');
    }
};
