<?php

// database/seeders/ReviewSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('reviews')->insert([
                'user' => $faker->userName,
                'username' => $faker->name,
                'createdAt' => $faker->dateTimeThisMonth(),
                'content' => $faker->paragraph,
                'portada' => $faker->imageUrl($width = 32, $height = 48),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
