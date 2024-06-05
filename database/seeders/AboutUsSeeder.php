<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear una instancia de Faker
        $faker = Faker::create();

        // Obtener todos los usuarios
        $users = User::all();

        // Iterar sobre cada usuario y asignar un 'about us' generado por Faker
        foreach ($users as $user) {
            // Generar un 'about us' aleatorio con entre 100 y 300 palabras
            $aboutUs = []; // Array para almacenar las oraciones

            // Continuar añadiendo oraciones hasta que se alcance la cantidad deseada de palabras
            while (str_word_count(implode(' ', $aboutUs)) < 100) {
                $aboutUs[] = $faker->sentence(); // Añadir otra oración
            }

            // Truncar el 'about us' a un máximo de 300 palabras
            $aboutUs = implode(' ', $aboutUs); // Unir todas las oraciones en un solo string
            $aboutUs = str_word_count($aboutUs) <= 300 ? $aboutUs : str_word_count($aboutUs, 300);

            // Asignar el 'about us' al usuario
            $user->about_us = $aboutUs;
            $user->save();
        }
    }
}
