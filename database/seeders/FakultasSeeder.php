<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakultasSeeder extends Seeder {
    public function run(): void {
        $fakultas = ['Teknik Informatika', 'Sistem Informasi', 'Teknik Elektro', 'Teknik Sipil', 'Teknik Mesin'];
        foreach ($fakultas as $fak) {
            DB::table('fakultas')->insert([
                'nama_fakultas' => $fak,
                'created_at' => now(), 'updated_at' => now()
            ]);
        }
    }
}