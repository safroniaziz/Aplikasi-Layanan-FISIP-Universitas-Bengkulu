<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanSurat extends Model
{
    use HasFactory;

    public $guarded = [];

    /**
     * Get the user that owns the PermohonanSurat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelengkapanSurats(){
        return $this->hasMany(KelengkapanSurat::class);
    }
}
