<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnggotaSuratTugas extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get the suratTugas that owns the AnggotaSuratTugas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function suratTugas(): BelongsTo
    {
        return $this->belongsTo(SuratTugas::class);
    }
}
