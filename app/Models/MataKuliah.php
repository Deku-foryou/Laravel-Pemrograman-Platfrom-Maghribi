<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    // Relasi balik ke Dosen dan Fakultas
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

    // Many-to-Many ke Mahasiswa (lewat tabel KRS)
    public function mahasiswas()
    {
        return $this->belongsToMany(Mahasiswa::class, 'krs', 'mata_kuliah_id', 'mahasiswa_id')
            ->withPivot('semester', 'tahun_ajaran')
            ->withTimestamps();
    }
}
