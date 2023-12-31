<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendaftaranKonseling extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'tanggal_dan_waktu_mulai',
        'tanggal_dan_waktu_selesai',
        'status',
        'deskripsi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
