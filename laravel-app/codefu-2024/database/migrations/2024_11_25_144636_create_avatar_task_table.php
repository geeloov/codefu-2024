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
        Schema::create('avatar_task', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('avatar_id')->constrained('avatars')->onDelete('cascade');
            $table->bigInteger('task_id');
            $table->date('date');
            $table->boolean('completed');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avatar_task');
    }
};
