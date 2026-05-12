<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'nip' => fake()->numerify('##################'),
            'photo' => null, // Sesuai permintaan: no foto
            'position' => fake()->randomElement(['Guru Mata Pelajaran', 'Wali Kelas', 'Ketua Jurusan']),
            'subject' => fake()->randomElement(['Matematika', 'Bahasa Inggris', 'Informatika', 'Bahasa Indonesia']),
            'bio' => fake()->sentence(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'order' => 0,
            'is_active' => true,
        ];
    }
}
