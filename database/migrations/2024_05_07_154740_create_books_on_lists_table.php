<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('books_on_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->unsignedBigInteger('list_id');
            $table->foreign('list_id')->references('id')->on('booklists');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books_on_lists');
    }
};
