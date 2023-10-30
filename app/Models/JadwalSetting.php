<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'text_footer',
        'link_youtube',
    ];
}
