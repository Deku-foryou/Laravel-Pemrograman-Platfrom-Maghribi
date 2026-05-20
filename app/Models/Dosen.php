<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    /** @use HasFactory<\Database\Factories\DosenFactory> */
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    // Satu Dosen membimbing banyak Mahasiswa
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'dosen_pembimbing_id');
    }

    // Satu Dosen mengajar banyak Mata Kuliah
    public function mata_kuliahs()
    {
        return $this->hasMany(MataKuliah::class, 'dosen_id');
    }
}
