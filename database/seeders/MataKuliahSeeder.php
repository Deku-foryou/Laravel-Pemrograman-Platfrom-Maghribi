<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MataKuliahSeeder extends Seeder {
    public function run(): void {
        $faker = Faker::create('id_ID');
       
        $listMatkul = [
            'Algoritma dan Pemrograman', 'Basis Data', 'Pemrograman Web Framework', 
            'Kecerdasan Buatan', 'Jaringan Komputer', 'Sistem Operasi', 
            'Kalkulus Lanjut', 'Rekayasa Perangkat Lunak', 'Struktur Data', 
            'Keamanan Siber', 'Pemrograman Mobile', 'Metode Numerik',
            'Manajemen Proyek TI', 'Interaksi Manusia dan Komputer', 'Kriptografi'
        ];

        foreach ($listMatkul as $index => $matkul) {
            DB::table('mata_kuliahs')->insert([
                'kode_matkul' => 'TIF-' . (1000 + $index), 
                'nama_matkul' => $matkul,
                'sks' => $faker->randomElement([2, 3, 4]),
                'fakultas_id' => 1, 
                'dosen_id' => $faker->numberBetween(1, 20),
                'created_at' => now(), 'updated_at' => now()
            ]);
        }
    }
}