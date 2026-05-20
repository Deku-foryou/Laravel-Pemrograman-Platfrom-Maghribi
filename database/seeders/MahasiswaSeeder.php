<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder {
    public function run(): void {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 100; $i++) {
            DB::table('mahasiswas')->insert([
                'nim' => $faker->unique()->numerify('2026####'),
                'nama' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'jurusan' => 'Informatika',
                'angkatan' => $faker->randomElement(['2024', '2025', '2026']),
                'dosen_pembimbing_id' => $faker->numberBetween(1, 20), // Relasi ke ID dosen 1-20
                'created_at' => now(), 'updated_at' => now()
            ]);
        }
    }
}