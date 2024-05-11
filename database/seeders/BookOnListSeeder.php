<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\BookList;
use App\Models\BookOnList;
use Faker\Factory as Faker;

class BookOnListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Obtener todos los IDs de libros y listas de libros
        $bookIds = Book::pluck('id')->all();
        $listIds = BookList::pluck('id')->all();

        // Crear relaciones entre libros y listas de libros falsas
        for ($i = 0; $i < 100; $i++) {
            $booksOnList = new BookOnList();
            $booksOnList->book_id = $faker->randomElement($bookIds);
            $booksOnList->list_id = $faker->randomElement($listIds);
            $booksOnList->save();
        }
    }
}
