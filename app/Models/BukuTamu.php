<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'nama_tamu',
        'keperluan',
        'tujuan',
        'no_hp',
        'foto',
    ];

    protected $casts = [
        'tanggal' => 'datetime',
    ];
}
