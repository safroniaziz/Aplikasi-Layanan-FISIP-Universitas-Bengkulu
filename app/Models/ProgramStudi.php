<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramStudi extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'kode';
    public $incrementing = false;

    protected $fillable = [
        'kode',
        'nama_prodi',
        'nama_fakultas',
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'prodi_kode');
    }
    public function matakuliah()
    {
        return $this->hasMany(MataKuliah::class, 'prodi_kode');
    }
    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'prodi_kode');
    }
}
