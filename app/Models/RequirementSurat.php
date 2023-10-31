<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequirementSurat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'jenis_surat_id',
        'requirement',
        'keterangan'
    ];

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class,'jenis_surat_id');
    }
}
