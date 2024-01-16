<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'nik' => $this->faker->nik(),
            'alamat' => $this->faker->address(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'golongan_darah' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'tanggal_lahir' => $this->faker->date('Y-m-d'),
            'user_id' => mt_rand(1, 3),
            'ibu_kandung' => $this->faker->name(),
            'foto_pasien' => base64_encode(file_get_contents($this->faker->imageUrl())),

        ];
    }
}
