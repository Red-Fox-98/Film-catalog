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
        Schema::create('movie_has_actors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('movie_id')->nullable()->constrained('movies')->cascadeOnDelete();
            $table->foreignId('actor_id')->nullable()->constrained('actors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_has_actors');
    }
};
