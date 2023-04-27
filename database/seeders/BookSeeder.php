<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Book::factory(100)->create();
        // $books = [];
        // for ($i=0; $i < 5000; $i++) { 
        //     $books[] = [
        //         'title' => fake()->realText(30, true),
        //         'author' => fake()->name,
        //         'genre' => fake()->randomElement(['JavaScript', 'Python', 'PHP', 'Vue', 'React', 'Cloud', 'Security', 'Business', 'Hardware', 'Data']),
        //         'description' => fake()->sentence(50, true),
        //         'isbn' => fake()->isbn13,
        //         'image' => fake()->imageUrl($width = 640, $height = 480, 'cats', true, 'Faker', true),
        //         'published_at' => fake()->date($format = 'Y-m-d', $max = 'now'),
        //         'publisher' => fake()->sentence(10, true),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }

        // Book::insert($books);
    }
}
