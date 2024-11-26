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
        Schema::create('forecasts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->bigInteger('pm10');
            $table->bigInteger('pm25');
            $table->bigInteger('no2');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forecasts');
    }
};
