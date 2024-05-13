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
        Schema::table('users', function (Blueprint $table) {
            // Agregar el campo 'about_us'
            $table->text('about_us')->nullable()->after('password'); // Cambia 'text' por el tipo de dato adecuado según tus necesidades
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar el campo 'about_us' si existe
            $table->dropColumn('about_us');
        });
    }
};
