<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            \Illuminate\Support\Facades\DB::table('books')->insert([
                'author_first_name' => $faker->firstName,
                'author_last_name' => $faker->lastName,
                'title' => $faker->sentence,
                'pages' => $faker->numberBetween(100, 500),
                'genres' => $faker->word,
                'rating' => $faker->randomFloat(1, 1, 5),
                'plot' => $faker->paragraph,
                'cover' => $faker->imageUrl(200, 300),
                'url' => $faker->url
            ]);
        }
    }
}

