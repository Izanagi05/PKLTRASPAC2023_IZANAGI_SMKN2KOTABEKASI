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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id('siswa_id');
            $table->string('nama');
            $table->Integer('nis');
            $table->text('alamat');
            $table->date('lahir');
            $table->unsignedBigInteger('kelas_id');
            // $table->foreign('kelas_id')->references('kelas_id')->on('kelass')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('siswas');
    }
};
