<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array
{
    return [
        'nik' => $this->faker->unique()->numerify('##########'),
        'nama' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
        'jabatan' => $this->faker->randomElement(['Admin', 'IT Support', 'HRD']),
    ];
}

}
