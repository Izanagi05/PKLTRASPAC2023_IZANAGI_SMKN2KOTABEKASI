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
            $table->string('Variable')->nullable();
            $table->string('Breakdown')->nullable();
            $table->string('Breakdown_category')->nullable();
            $table->string('Year')->nullable();
            $table->string('RD_Value')->nullable();
            $table->string('Status')->nullable();
            $table->string('Unit')->nullable();
            $table->string('Footnotes')->nullable();
            $table->string('Relative_Sampling_Error')->nullable();
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
