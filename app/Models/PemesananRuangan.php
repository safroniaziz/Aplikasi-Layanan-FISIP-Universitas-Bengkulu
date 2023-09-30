<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemesananRuangan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'ruangan_id',
        'mahasiswa_npm',
        'tanggal_dan_waktu_mulai',
        'tanggal_dan_waktu_selesai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function ruangan()
    {
        return $this->belongsTo(RuanganPoadcast::class, 'ruangan_id');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_npm');
    }
}
