<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratTugas extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get all of the anggotas for the SuratTugas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function anggotas(): HasMany
    {
        return $this->hasMany(AnggotaSuratTugas::class);
    }
}
