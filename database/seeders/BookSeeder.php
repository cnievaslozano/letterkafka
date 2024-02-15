<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new Client();

        $existingBookIds = Book::pluck('book_id')->toArray();
        $successfulRequests = 0;

        for ($i = 0; $i < 1000; $i++) {
            $response = $client->request('GET', 'https://books-api7.p.rapidapi.com/books/get/random/', [
                'headers' => [
                    'X-RapidAPI-Host' => 'books-api7.p.rapidapi.com',
                    'X-RapidAPI-Key' => '74f7b80806mshe51d26471ed199fp17cdfdjsn83face454e73',
                ],
            ]);

            $bookData = json_decode($response->getBody(), true);

            // Verificar si la clave "review" existe en el arreglo
            if (array_key_exists('review', $bookData)) {
                if (!in_array($bookData['book_id'], $existingBookIds)) {
                    Book::create([
                        'author_first_name' => $bookData['author']['first_name'],
                        'author_last_name' => $bookData['author']['last_name'],
                        'review_name' => $bookData['review']['name'],
                        'review_body' => $bookData['review']['body'],
                        'external_id' => $bookData['_id'],
                        'book_id' => $bookData['book_id'],
                        'title' => $bookData['title'],
                        'pages' => $bookData['pages'],
                        'genres' => json_encode($bookData['genres']),
                        'rating' => $bookData['rating'],
                        'plot' => $bookData['plot'],
                        'cover' => $bookData['cover'],
                        'url' => $bookData['url'],
                    ]);

                    $existingBookIds[] = $bookData['book_id']; // Agrega el nuevo book_id a la lista de ids existentes
                    $successfulRequests++;
                }
            }
        }

        echo "Se guardaron $successfulRequests libros en la base de datos.";
    }
}