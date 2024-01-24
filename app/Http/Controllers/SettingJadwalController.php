<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalSetting;
use Illuminate\Support\Facades\Gate;

class SettingJadwalController extends Controller
{
    public function index()
    {
        if (!Gate::allows('jadwalPerkuliahan')) {
            abort(403);
        }
        $setting = JadwalSetting::first();
        return view('backend/settingJadwal.index', [
            'setting'  =>  $setting,
        ]);
    }
}
