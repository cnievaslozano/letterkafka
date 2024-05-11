<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\BookList;
use Faker\Factory as Faker;

class BookListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Obtener todos los IDs de usuarios
        $userIds = User::pluck('id')->all();

        // Crear 50 listas de libros falsas
        for ($i = 0; $i < 100; $i++) {
            $bookList = new BookList();
            $bookList->user_id = $faker->randomElement($userIds);
            $bookList->list_name = $faker->sentence(3); // Genera un nombre de lista aleatorio
            $bookList->description = $faker->paragraph(2); // Genera una descripción aleatoria
            $bookList->save();
        }
    }
}
