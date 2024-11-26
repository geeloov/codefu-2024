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
        Schema::create('avatar_item', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('active');
            $table->softDeletes();
            $table->foreignId('avatar_id')->constrained('avatars')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avatar_item');
    }
};
