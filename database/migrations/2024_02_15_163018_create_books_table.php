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
            $table->string('author_first_name');
            $table->string('author_last_name');
            $table->string('title');
            $table->integer('pages');
            $table->string('genres');
            $table->float('rating');
            $table->text('plot');
            $table->string('cover')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}