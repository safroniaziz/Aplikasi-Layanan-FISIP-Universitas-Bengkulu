<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dosen extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'nip';
    public $incrementing = false;

    protected $fillable = [
        'nip',
        'prodi_kode',
        'nama_dosen',
    ];

    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_kode');
    }

    public function pengampu()
    {
        return $this->hasMany(Pengampu::class, 'pengampu');
    }
}
