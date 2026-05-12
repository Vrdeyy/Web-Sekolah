<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Major>
 */
class MajorFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'short_name' => strtoupper(substr($name, 0, 3)),
            'icon' => null,
            'image' => null, // Sesuai permintaan: no foto
            'short_description' => fake()->sentence(),
            'description' => fake()->paragraphs(2, true),
            'career_prospects' => fake()->sentence(),
            'competencies' => fake()->sentence(),
            'order' => 0,
            'is_active' => true,
        ];
    }
}
