<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    /** @use HasFactory<\Database\Factories\MahasiswaFactory> */
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    // One-to-One ke Phone
    public function phone()
    {
        return $this->hasOne(Phone::class);
    }

    // Relasi balik ke Dosen Pembimbing
    public function dosen_pembimbing()
    {
        return $this->belongsTo(Dosen::class, 'dosen_pembimbing_id');
    }

    // Many-to-Many ke Mata Kuliah (lewat tabel KRS)
    public function mata_kuliahs()
    {
        return $this->belongsToMany(MataKuliah::class, 'krs', 'mahasiswa_id', 'mata_kuliah_id')
            ->withPivot('semester', 'tahun_ajaran')
            ->withTimestamps();
    }
}
