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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('author_first_name');
            $table->string('author_last_name');
            $table->string('review_name');
            $table->text('review_body');
            $table->string('external_id');
            $table->integer('book_id')->unsigned();
            $table->string('title');
            $table->integer('pages')->unsigned();
            $table->json('genres');
            $table->float('rating', 4, 2);
            $table->text('plot');
            $table->string('cover');
            $table->text('url');
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