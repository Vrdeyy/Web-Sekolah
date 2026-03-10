<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'nip' => fake()->numerify('##################'),
            'photo' => null,
            'position' => fake()->randomElement(['Administrasi', 'Keuangan', 'Perpustakaan', 'Keamanan']),
            'department' => fake()->randomElement(['TU', 'Sarpras', 'Kesiswaan']),
            'bio' => fake()->sentence(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'order' => 0,
            'is_active' => true,
        ];
    }
}
