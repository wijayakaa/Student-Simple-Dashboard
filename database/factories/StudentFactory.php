<?php

namespace Database\Factories;
namespace App\Models;
use App\Models\Student;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kelas_siswa' => $this->faker->randomElement(['10 PPLG 1', '10 PPLG 2', '11 PPLG 1', '11 PPLG 2']),
        ];
    }
}