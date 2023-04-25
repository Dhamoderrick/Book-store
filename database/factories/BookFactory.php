<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->realText(30, true);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'author' => $this->faker->name,
            'genre' => $this->faker->randomElement(['JavaScript', 'Python', 'PHP', 'Vue', 'React', 'Cloud', 'Security', 'Business', 'Hardware', 'Data']),
            'description' => $this->faker->sentence(50, true),
            'isbn' => $this->faker->isbn13,
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'published_at' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'publisher' => $this->faker->sentence(10, true),
        ];
    }
}
