<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KrsSeeder extends Seeder {
    public function run(): void {
        $faker = Faker::create('id_ID');
        
        for ($i = 1; $i <= 100; $i++) {
            DB::table('krs')->insert([
                'mahasiswa_id' => $i, 
               
                'mata_kuliah_id' => $faker->numberBetween(1, 15), 
                'semester' => $faker->randomElement(['2', '4', '6']),
                'tahun_ajaran' => '2025/2026',
                'created_at' => now(), 'updated_at' => now()
            ]);
        }
    }
}