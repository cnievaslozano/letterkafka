<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('reviews')->insert([
                'review_name' => $faker->name,
                'review_body' => $faker->paragraph,
                'external_id' => $faker->unique()->randomNumber(),
                'book_id' => $faker->numberBetween(1, 20)
            ]);
        }
    }
}
