<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(2)->create();

        \App\Models\User::factory()->create([
            'name' => 'Rs Karyadi',
            'email' => 'coba@gmail.com',
            'password' => '12345678'
        ]);

        $this->call([
            PasienSeeder::class,
            RekamMedisSeeder::class,
        ]);
    }
}
