<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Review;
use App\Models\LikeReview;
use Faker\Factory as Faker;
use Carbon\Carbon;

class LikeReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Obtener todos los IDs de usuarios y revisiones
        $userIds = User::pluck('id')->all();
        $reviewIds = Review::pluck('id')->all();

        // Crear 100 'me gusta' de revisiones falsos
        for ($i = 0; $i < 100; $i++) {
            $likeReview = new LikeReview();
            $likeReview->review_id = $faker->randomElement($reviewIds);
            $likeReview->user_id = $faker->randomElement($userIds);
            $likeReview->like_date = Carbon::now()->subDays(rand(0, 365)); // Fecha de 'me gusta' aleatoria en el último año
            $likeReview->save();
        }
    }
}
