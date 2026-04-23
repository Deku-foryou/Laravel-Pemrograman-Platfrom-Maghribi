<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\DosenSeeder;
use Database\Seeders\KaryawanSeeder;
use Database\Seeders\MahasiswaSeeder;
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
        BlogSeeder::class,
         MahasiswaSeeder::class,
    DosenSeeder::class,
    KaryawanSeeder::class
        
       ]);
    }
}
