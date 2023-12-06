<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\JadwalPerkuliahan;
use App\Models\JadwalPerkuliahanStatus;
use App\Models\RuanganKelas;

class PerubahanJadwalController extends Controller
{
    public function index(Request $request){
        setlocale(LC_ALL, 'IND');
        $ruangans = RuanganKelas::all();
        $hariIni = Carbon::now()->dayName; // Pastikan Anda mendapatkan nama hari dengan benar
        $tanggalSekarang = Carbon::now()->toDateString();
        $pembatalanKelas = JadwalPerkuliahanStatus::where('tanggal',$tanggalSekarang)->pluck('jadwal_perkuliahan_id');
        $nama = $request->query('nama');
        if (!empty($nama)) {
            $jadwalBerlangsung = JadwalPerkuliahan::with(['matakuliah.prodi'])
                                                    ->whereHas('mataKuliah',function($query) use ($nama){
                                                        $query->where('nama_mata_kuliah', 'like', '%' . $nama . '%');
                                                    })
                                                    ->whereNotIn('id',$pembatalanKelas)
                                                    ->where('hari',$hariIni)
                                                    ->paginate(10);
        }else{
            $jadwalBerlangsung = JadwalPerkuliahan::with(['matakuliah.prodi'])->whereNotIn('id',$pembatalanKelas)->where('hari',$hariIni)->paginate(10);
        }
        return view('backend.perubahanJadwal.index',[
            'jadwalBerlangsungs'   =>  $jadwalBerlangsung,
            'ruangans'   =>  $ruangans,
            'hariIni'   =>  $hariIni,
            'nama'   =>  $nama,
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

            $notification = array(
                'message' => 'Berhasil, Jadwal berhasil dibatalkan',
                'alert-type' => 'success'
            );
            return redirect()->route('perubahanJadwal')->with($notification);
        }
    }
}
