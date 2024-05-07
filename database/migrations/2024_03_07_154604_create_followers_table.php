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
        Schema::create('followers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_following_user');
            $table->foreign('id_following_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_followed_user');
            $table->foreign('id_followed_user')->references('id')->on('users');
            $table->date('follow_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('followers');
    }
};
