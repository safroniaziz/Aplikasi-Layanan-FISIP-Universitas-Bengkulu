<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MahasiswaMataKuliah extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'mata_kuliah_id',
        'mahasiswa_npm',
    ];

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_npm');
    }
}
