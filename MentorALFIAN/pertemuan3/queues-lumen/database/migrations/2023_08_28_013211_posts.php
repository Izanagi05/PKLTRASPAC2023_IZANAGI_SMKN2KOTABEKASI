<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function(Blueprint $table){
            $table->id('transaksi_id');
            $table->unsignedBigInteger('penggunas_pengguna_id');
            $table->unsignedBigInteger('produks_produk_id');
            $table->string('keterangan');
            $table->timestamps();
            // $table->id('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('transaksis');
    }
};
