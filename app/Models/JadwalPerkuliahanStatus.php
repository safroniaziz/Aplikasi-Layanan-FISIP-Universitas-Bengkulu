<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPerkuliahanStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'jadwal_perkuliahan_id',
        'is_cancel',
        'tanggal',
    ];
}
