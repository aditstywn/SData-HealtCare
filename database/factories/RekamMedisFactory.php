<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RekamMedis>
 */
class RekamMedisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'deskripsi' => $this->faker->text(),
            'tanggal_periksa' => $this->faker->date('Y-m-d'),
            'image' => $this->faker->imageUrl(),
            'pasien_id' => mt_rand(1, 3),
        ];
    }
}
