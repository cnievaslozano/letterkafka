<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            $user = new User();
            $user->name = $faker->name;
            $user->email = $faker->unique()->safeEmail;
            $user->password = bcrypt(Str::random(16)); // Genera una contraseña aleatoria de 16 caracteres
            $user->profile_photo_path = 'profile-photos/defAvatar' . rand(1, 11) . '.jpg'; // Suponiendo que tienes 5 imágenes de perfil en la carpeta public/images/profiles
            $user->save();
        }
    }
}
