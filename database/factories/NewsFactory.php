<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'category' => fake()->randomElement(['Kegiatan', 'Prestasi', 'Pengumuman', 'Ekskul']),
            'image' => null, // Sesuai permintaan: no foto
            'excerpt' => fake()->paragraph(),
            'content' => fake()->paragraphs(3, true),
            'author' => fake()->name(),
            'views' => fake()->numberBetween(0, 1000),
            'is_featured' => fake()->boolean(20),
            'is_active' => true,
            'published_at' => now(),
        ];
    }
}
