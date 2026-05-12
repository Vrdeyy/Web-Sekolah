<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessCenter>
 */
class BusinessCenterFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'image' => null,
            'short_description' => fake()->sentence(),
            'description' => fake()->paragraphs(2, true),
            'location' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'order' => 0,
            'is_active' => true,
        ];
    }
}
