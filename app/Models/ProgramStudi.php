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

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'prodi_kode');
    }

    public function getJumlahMahasiswaProdiAttribute(){
        return $this->mahasiswas()->count();
    }

    public function mataKuliahs()
    {
        return $this->hasMany(MataKuliah::class, 'prodi_kode');
    }

    public function getJumlahMataKuliahProdiAttribute(){
        return $this->mataKuliahs()->count();
    }

    public function jadwals()
    {
        return $this->hasManyThrough(JadwalPerkuliahan::class, MataKuliah::class);
    }

    public function jumlahJadwal()
    {
        return $this->jadwals()->count();
    }

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'prodi_kode');
    }
}
