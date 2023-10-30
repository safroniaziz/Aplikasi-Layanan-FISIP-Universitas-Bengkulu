<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSettingFooter extends Model
{
    use HasFactory;

    protected $fillable = [
        'jadwal_setting_id',
        'text_footer',
        'visible',
    ];
}
