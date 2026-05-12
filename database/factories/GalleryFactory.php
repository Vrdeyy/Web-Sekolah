<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'type' => 'photo',
            'image' => null,
            'video_url' => null,
            'description' => fake()->sentence(),
            'category' => fake()->randomElement(['Kegiatan', 'Sarana', 'Lomba']),
            'order' => 0,
            'is_active' => true,
        ];
    }
}
