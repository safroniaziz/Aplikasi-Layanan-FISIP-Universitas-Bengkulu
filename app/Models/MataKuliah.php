<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MataKuliah extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'prodi_kode',
        'nama_mata_kuliah',
        'kode_mata_kuliah',
        'sks',
        'semester',
        'keterangan',
    ];

    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_kode');
    }
    public function pengampu()
    {
        return $this->hasMany(Pengampu::class, 'mata_kuliah_id');
    }
    public function jadwalperkuliahan()
    {
        return $this->hasMany(JadwalPerkuliahan::class, 'mata_kuliah_id');
    }
    public function mahasiswamatakuliah()
    {
        return $this->hasMany(MahasiswaMataKuliah::class, 'mata_kuliah_id');
    }


}

