<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Achievement>
 */
class AchievementFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'student_name' => fake()->name(),
            'competition_name' => fake()->words(3, true),
            'level' => fake()->randomElement(['Nasional', 'Provinsi', 'Kota/Kabupaten']),
            'rank' => fake()->randomElement(['Juara 1', 'Juara 2', 'Juara 3', 'Harapan 1']),
            'year' => fake()->year(),
            'image' => null, // Sesuai permintaan: no foto
            'description' => fake()->sentence(),
            'order' => 0,
            'is_active' => true,
        ];
    }
}
