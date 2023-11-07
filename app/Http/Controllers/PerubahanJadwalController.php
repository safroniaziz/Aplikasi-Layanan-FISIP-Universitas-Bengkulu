<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\JadwalPerkuliahan;
use App\Models\JadwalPerkuliahanStatus;
use App\Models\RuanganKelas;

class PerubahanJadwalController extends Controller
{
    public function index(){
        setlocale(LC_ALL, 'IND');
        $hariIni = Carbon::now()->formatLocalized('%A');
        $ruangans = RuanganKelas::all();
        $jadwalBerlangsung = JadwalPerkuliahan::with(['matakuliah.prodi'])->where('hari',$hariIni)->get();
        return view('backend.perubahanJadwal.index',[
            'jadwalBerlangsungs'   =>  $jadwalBerlangsung,
            'ruangans'   =>  $ruangans,
        ]);
    }

    public function getData(JadwalPerkuliahan $jadwal){
        $data = JadwalPerkuliahan::where('id',$jadwal->id)
                                    ->with(['matakuliah.prodi'])
                                    ->first();
        return $data;
    }

    public function update(Request $request){
        $status = $request->status;
        $jadwal_id = $request->jadwal_id;
        if ($status == "dibatalkan") {
            JadwalPerkuliahanStatus::create([
                'jadwal_perkuliahan_id' =>  $jadwal_id,
                'is_cancel' =>  1,
                'tanggal'   =>  Carbon::now()->toDateString(),
            ]);
        }
    }
}
