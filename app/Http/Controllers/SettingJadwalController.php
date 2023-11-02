<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalSetting;

class SettingJadwalController extends Controller
{
    public function index()
    {
        $setting = JadwalSetting::first();
        return view('backend/settingJadwal.index', [
            'setting'  =>  $setting,
        ]);
    }
}
