<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'subtitle' => fake()->sentence(),
            'image' => '', // Sesuai permintaan: minimalis
            'button_text' => 'Selengkapnya',
            'button_url' => '#',
            'order' => 0,
            'is_active' => true,
        ];
    }
}
