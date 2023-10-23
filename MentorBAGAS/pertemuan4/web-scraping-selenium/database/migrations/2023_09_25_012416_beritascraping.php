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
        schema::create('beritascarpings', function(Blueprint $table){
            $table->id('berita_id');
            $table->string('judul');
            $table->text('isi');
            $table->date('dibuatpada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::drop('beritascarpings');
    }
};
