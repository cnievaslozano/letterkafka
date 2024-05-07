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
        Schema::create('likes_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_review');
            $table->foreign('id_review')->references('id')->on('reviews');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->date('like_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('likes_reviews');
    }
};
