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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('synopsis');
            $table->string('director');
            $table->integer('punctuation')->nullable();
            $table->time('duration');
            $table->string('video');
            $table->string('poster');
            //$table->integer('category_id')->unsigned();
            //$table->foreign('category_id')->references('id')->on('categorias');

            //$table->unsignedBigInteger('categoria_id');
            //$table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
