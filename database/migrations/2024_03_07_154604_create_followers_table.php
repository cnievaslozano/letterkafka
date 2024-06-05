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
            $table->unsignedBigInteger('following_user_id');
            $table->foreign('following_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('followed_user_id');
            $table->foreign('followed_user_id')->references('id')->on('users');
            $table->date('follow_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('followers');
    }
};
