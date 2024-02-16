<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('etag')->nullable();
            $table->string('selflink')->nullable();
            $table->text('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->json('authors')->nullable();
            $table->json('genres')->nullable();
            $table->string('publishedDate')->nullable();
            $table->text('description')->nullable();
            $table->json('industryIdentifiers')->nullable();
            $table->integer('pageCount')->nullable();
            $table->string('maturityRating')->nullable();
            $table->json('imageLinks')->nullable();
            $table->string('language')->nullable();
            $table->string('previewLink')->nullable();
            $table->string('infoLink')->nullable();
            $table->string('accessInfo_country')->nullable();
            $table->json('epub')->nullable();
            $table->string('webReaderLink')->nullable();
            $table->text('textSnippet')->nullable();
            $table->string('amazon_product_url')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}