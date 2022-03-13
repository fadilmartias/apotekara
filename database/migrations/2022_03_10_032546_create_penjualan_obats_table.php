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
        Schema::create('penjualan_obats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('obat_id')->unsigned();
            // $table->foreignId('obat_id')->constrained();
            $table->foreignId('penjualan_id')->constrained();
            $table->integer('qty')->nullable();
            $table->string('no_penjualan');
            $table->string('satuan')->nullable();
            $table->integer('harga')->nullable();
            $table->timestamps();

            $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade');
            $table->foreign('no_penjualan')->references('no_penjualan')->on('penjualans')->onDelete('cascade');
            // $table->foreign('penjualan_id')->references('id')->on('penjualans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan_obats');
    }
};
