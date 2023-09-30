<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RuanganPoadcast extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_ruangan',
        'deskripsi',
        'kapasitas',
        'lokasi',
        'harga_sewa',
        'foto',
    ];

    public function pemesananruangan()
    {
        return $this->hasMany(PemesananRuangan::class, 'ruangan_id');
    }
}
