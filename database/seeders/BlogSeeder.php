<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('blogs')->truncate();
        Schema::enableForeignKeyConstraints();

        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 100; $i++) {
            DB::table('blogs')->insert([
           
                'title' => $faker->unique()->sentence(6), 
                'description' => $faker->paragraph(),
                'created_at' => now(), 
                'updated_at' => now()
            ]);
        }
    }
}