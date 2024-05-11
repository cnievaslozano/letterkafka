<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Book;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
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

        // Crear 100 revisiones falsas
        for ($i = 0; $i < 100; $i++) {
            $review = new Review();
            $review->book_id = $faker->randomElement($bookIds);
            $review->user_id = $faker->randomElement($userIds);
            $review->review = $faker->paragraphs($faker->numberBetween(1, 5)); // Utiliza paragraphs() con un número aleatorio de párrafos
            $review->rating = $faker->numberBetween(1, 5);
            $review->creation_date = Carbon::now()->subDays(rand(0, 365))->format('Y-m-d');
            $review->save();
        }
    }
}
