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
        Schema::create('bisnis', function (Blueprint $table) {
            $table->id('bisnis_id');
            $table->string('series_reference')->nullable();
            $table->string('period')->nullable();
            $table->string('data_value')->nullable();
            $table->string('suppressed')->nullable();
            $table->string('status')->nullable();
            $table->string('units')->nullable();
            $table->string('magnitude')->nullable();
            $table->string('subject')->nullable();
            $table->string('group')->nullable();
            $table->string('series_title_1')->nullable();
            $table->string('series_title_2')->nullable();
            $table->string('series_title_3')->nullable();
            $table->string('series_title_4')->nullable();
            $table->string('series_title_5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bisnis');
    }
};
