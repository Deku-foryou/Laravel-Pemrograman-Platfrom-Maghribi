<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\DosenSeeder;
use Database\Seeders\FakultasSeeder;
use Database\Seeders\KaryawanSeeder;
use Database\Seeders\KrsSeeder;
use Database\Seeders\MahasiswaSeeder;
use Database\Seeders\MataKuliahSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
        UserSeeder::class,
        KaryawanSeeder::class,
       
        FakultasSeeder::class, 
        DosenSeeder::class,
        
       
        MataKuliahSeeder::class, 
        MahasiswaSeeder::class,
        
        
        KrsSeeder::class, 
        
        BlogSeeder::class,
       ]);
    }
}
