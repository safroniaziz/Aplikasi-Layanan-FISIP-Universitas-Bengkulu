<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalPerkuliahan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'mata_kuliah_id',
        'ruangan_kelas_id',
        'hari',
        'waktu_mulai',
        'waktu_selesai',
    ];

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }
    public function ruangankelas()
    {
        return $this->belongsTo(RuanganKelas::class, 'ruangan_kelas_id');
    }
}
