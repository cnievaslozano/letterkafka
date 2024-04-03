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

        foreach (range(1, 100) as $index) {
            DB::table('reviews')->insert([
                'user' => $faker->userName,
                'username' => $faker->name,
                'createdAt' => $faker->dateTimeThisMonth(),
                'content' => $faker->paragraph,
                'userImage' => $faker->imageUrl($width = 24, $height = 24),
                'portada' => $faker->imageUrl($width = 32, $height = 48),
                'likes' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
