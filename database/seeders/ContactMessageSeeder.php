<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\ContactMessage;
use Carbon\Carbon;

class ContactMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $userIds = User::pluck('id')->all();

        for ($i = 0; $i < 10; $i++) {
            $contact_message = new ContactMessage();
            $contact_message->user_id = $faker->randomElement($userIds);
            $contact_message->subject = $faker->paragraph(); // Utiliza paragraphs() con un número aleatorio de párrafos
            $paragraphs = $faker->paragraphs($faker->numberBetween(2,5)); // Utiliza paragraphs() con un número aleatorio de párrafos
            $contact_message->message = implode(' ', $paragraphs); // Concatena los párrafos separados por espacios
            $contact_message->contact_form_date = Carbon::now()->subDays(rand(0, 365))->format('Y-m-d');
            $contact_message->save();
        }
    }
}
