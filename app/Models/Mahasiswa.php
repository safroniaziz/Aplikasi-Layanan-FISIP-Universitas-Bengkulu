<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'npm';
    public $incrementing = false;

    protected $fillable = [
        'npm',
        'prodi_kode',
        'nama_mahasiswa',
    ];

    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_kode');
    }
    public function pemesananruangan()
    {
        return $this->hasMany(PemesananRuangan::class, 'mahasiswa_npm');
    }

    public function mahasiswamatakuliah()
    {
        return $this->hasMany(MahasiswaMataKuliah::class, 'mahasiswa_npm');
    }
}
