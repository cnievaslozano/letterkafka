<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Follower;
use Faker\Factory as Faker;
use Carbon\Carbon;

class FollowerSeeder extends Seeder
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

        // Crear 100 seguidores falsos
        for ($i = 0; $i < 200000; $i++) {
            // Seguidor que sigue a otro usuario
            $follower = new Follower();
            $follower->following_user_id = $faker->randomElement($userIds);
            $follower->followed_user_id = $faker->randomElement($userIds);
            // Asegurarse de que el usuario que sigue no sea el mismo que el usuario seguido
            while ($follower->following_user_id === $follower->followed_user_id) {
                $follower->followed_user_id = $faker->randomElement($userIds);
            }
            $follower->follow_date = Carbon::now()->subDays(rand(0, 365)); // Fecha de seguimiento aleatoria en el último año
            $follower->save();
        }
    }
}
