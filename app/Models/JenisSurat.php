<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisSurat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'jenis_surat',
        'keterangan'
    ];

    public function requirements()
    {
        return $this->hasMany(RequirementSurat::class,'jenis_surat_id');
    }
}
