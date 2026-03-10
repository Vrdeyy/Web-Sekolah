<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'logo' => null,
            'website' => fake()->url(),
            'description' => fake()->sentence(),
            'order' => 0,
            'is_active' => true,
        ];
    }
}
