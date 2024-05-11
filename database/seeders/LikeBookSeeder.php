<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use App\Models\LikeBook;
use Faker\Factory as Faker;
use Carbon\Carbon;

class LikeBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Obtener todos los IDs de usuarios y libros
        $userIds = User::pluck('id')->all();
        $bookIds = Book::pluck('id')->all();

        // Crear 100 'me gusta' de libros falsos
        for ($i = 0; $i < 100; $i++) {
            $likeBook = new LikeBook();
            $likeBook->book_id = $faker->randomElement($bookIds);
            $likeBook->user_id = $faker->randomElement($userIds);
            $likeBook->like_date = Carbon::now()->subDays(rand(0, 365)); // Fecha de 'me gusta' aleatoria en el último año
            $likeBook->save();
        }
    }
}
