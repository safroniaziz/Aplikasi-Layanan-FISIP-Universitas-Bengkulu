<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RuanganKelas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_ruangan_kelas',
    ];
    public function jadwalperkuliahan()
    {
        return $this->hasMany(JadwalPerkuliahan::class, 'ruangan_kelas_id');
    }

}
