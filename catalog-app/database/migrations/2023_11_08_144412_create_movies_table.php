<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('director_id');
            $table->unsignedBigInteger('preview_id');
            $table->string('name');
            $table->float('rating');
            $table->date('date');

            $table->foreign('director_id')->references('id')->on('directors');
            $table->foreign('preview_id')->references('id')->on('previews');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
