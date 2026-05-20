<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DosenSeeder extends Seeder {
    public function run(): void {
        $faker = Faker::create('id_ID');
        
        for ($i = 1; $i <= 20; $i++) {
            
            $gelarDepan = $faker->randomElement(['', '', 'Dr. ', 'Prof. ']);
            $gelarBelakang = $faker->randomElement([', S.Kom., M.Kom.', ', S.T., M.T.', ', Ph.D.']);
            
            DB::table('dosens')->insert([
                'nidn' => $faker->unique()->numerify('00########'),
                'nama' => $gelarDepan . $faker->firstName . ' ' . $faker->lastName . $gelarBelakang,
                'email' => $faker->unique()->safeEmail,
                'created_at' => now(), 'updated_at' => now()
            ]);
        }
    }
}