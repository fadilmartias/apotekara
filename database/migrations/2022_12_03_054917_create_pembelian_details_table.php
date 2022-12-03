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
        Schema::create('pembelian_details', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi');
            $table->foreignId('obat_id')->constrained();
            $table->integer('harga')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('total_harga')->nullable();
            $table->timestamps();

            $table->foreign('no_transaksi')->references('no_transaksi')->on('pembelians');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian_details');
    }
};
