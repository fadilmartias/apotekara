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
        Schema::create('pembelian_obats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pembelian');
            $table->string('no_transaksi');
            $table->unsignedBigInteger('id_obat');
            $table->integer('qty');
            $table->string('satuan');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('id_pembelian')->references('id')->on('pembelians');
            $table->foreign('id_obat')->references('id')->on('obats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian_obats');
    }
};
