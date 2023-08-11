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
        Schema::create('pelajaranmurids', function(Blueprint $table){
            $table->id('pelajaranmurid_id');
            $table->unsignedBigInteger('pelajaran_pelajaran_id');
            $table->unsignedBigInteger('murids_murid_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('pelajaranmurids');
    }
};
