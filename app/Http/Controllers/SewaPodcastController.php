<?php

namespace App\Http\Controllers;

use Str;
use App\Models\AlatPoadcast;
use Illuminate\Http\Request;
use App\Models\RuanganPoadcast;
use App\Models\PemesananRuangan;

class SewaPodcastController extends Controller
{
    public function index( )
    {
        $ruanganPoadcasts = RuanganPoadcast::first();
        $alatPoadcasts = AlatPoadcast::all();
        $pemesananRuangan = PemesananRuangan::with('mahasiswa')->where('deleted_at', NULL)->get();
        $cek_waktu = PemesananRuangan::pluck('tanggal_dan_waktu_mulai')->where('deleted_at', NULL)->toArray();



        return view('frontend.sewa_podcast', [
            'ruanganPoadcasts' => $ruanganPoadcasts,
            'alatPoadcasts' => $alatPoadcasts,
            'pemesananRuangans' => $pemesananRuangan,
            'cek_waktu'=> $cek_waktu,
        ] );
    }

    public function store(Request $request)
    {
        $request->validate([
            'waktu' => ['required'],
            'no_wa' => ['required'],
            'tanggal_sewa' => ['required'],
            'keperluan' => ['required'],

        ]);
        $originalDate = $request->tanggal_sewa;
        $waktu = $request->waktu;
        $tanggal =  date("Y-m-d", strtotime(str_replace("/", "-", $originalDate)));
        $datetime_combined = $tanggal . ' ' . $waktu;

        $cek_waktu = PemesananRuangan::where('tanggal_dan_waktu_mulai', $datetime_combined)->count();
        if ($cek_waktu!=0) {
            return redirect('/sewa_podcast')->with(['error'    =>  'pendaftaran gagal tanggal <strong>'. $tanggal. '</strong> pukul <strong>'.$waktu. '</strong> telah digunakan']);

        }else{
            $save = PemesananRuangan::create([
                'user_id' => $request->user_id,
                'ruangan_id' => $request->ruangan_id,
                'no_wa' => $request->no_wa,
                'keperluan' => $request->keperluan,
                'tanggal_dan_waktu_mulai' => $datetime_combined,
                'tanggal_dan_waktu_selesai' => $datetime_combined,
            ]);

            if ($save) {
                return redirect('/sewa_podcast')->with(['success'    =>  'Selamat, Pendaftaran sewa ruang podcast Berhasil, Silahkan Tunggu Konfirmasi Pendaftaran Anda']);
            }
        }


    }
}


