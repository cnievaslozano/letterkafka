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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('author')->nullable();
            $table->text('description')->nullable();
            $table->text('genre')->nullable();
            $table->json('buy_links')->nullable();
            $table->integer('pages')->nullable();
            $table->date('release_date')->nullable();
            $table->string('cover')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
