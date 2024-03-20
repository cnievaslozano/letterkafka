<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = base_path('database/info-books/planeta_libros.json');

        if (!File::exists($jsonPath)) {
            echo "El archivo JSON no existe.";
            return;
        }

        $jsonData = File::get($jsonPath);
        $booksData = json_decode($jsonData, true);

        foreach ($booksData as $bookData) {
            $pagines = intval($bookData['Paginas'] ?? "") >= 1000 ? 0 : intval($bookData['Paginas'] ?? "");
            $releaseDate = !empty($bookData['Fecha_Publicacion']) ? date('Y-m-d', strtotime($bookData['Fecha_Publicacion'])) : null;
            $cover = !empty($bookData['Portada']) ? $bookData['Portada'] : null;

            Book::create([
                'title' => $bookData['Titulo'],
                'author' => $bookData['Autor'],
                'description' => $bookData['Descripcion'],
                'genre' => $bookData['Genero'],
                'buy_links' => json_encode($bookData['Links_compras']),
                'pages' => $pagines,
                'release_date' => $releaseDate,
                'cover' => $cover,
            ]);
        }
    }
}
