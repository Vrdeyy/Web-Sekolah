<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Extracurricular>
 */
class ExtracurricularFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'icon' => null,
            'image' => null,
            'short_description' => fake()->sentence(),
            'description' => fake()->paragraphs(2, true),
            'schedule' => 'Sore Hari',
            'coach' => fake()->name(),
            'order' => 0,
            'is_active' => true,
        ];
    }
}
