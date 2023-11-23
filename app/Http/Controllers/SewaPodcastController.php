<?php

namespace App\Http\Controllers;

use Str;
use App\Models\AlatPoadcast;
use Illuminate\Http\Request;
use App\Models\RuanganPoadcast;
use App\Models\PemesananRuangan;

class sewaPodcastController extends Controller
{
    public function index( )
    {
        $ruanganPoadcasts = RuanganPoadcast::first();
        $alatPoadcasts = AlatPoadcast::all();
        $pemesananRuangan = PemesananRuangan::with('mahasiswa')->get();



        return view('frontend.sewa_podcast', [
            'ruanganPoadcasts' => $ruanganPoadcasts,
            'alatPoadcasts' => $alatPoadcasts,
            'pemesananRuangans' => $pemesananRuangan,
        ] );
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'tgl_start' => ['required'],
            // 'tgl_end' => ['required'],
            // 'waktu_start' => ['required'],
            // 'waktu_end' => ['required'],
            'tanggal_sewa' => ['required'],
            // 'npm' => ['required'],

        ]);
        $originalDate = $request->tanggal_sewa;
        $tanggal =  date("Y-m-d", strtotime(str_replace("/", "-", $originalDate)));

        $save = PemesananRuangan::create([
            'user_id' => $request->user_id,
            'ruangan_id'=>$request->ruangan_id,
            'tanggal_dan_waktu_mulai' => $tanggal,
            'tanggal_dan_waktu_selesai' => $tanggal,
        ]);

        if ($save) {
            return redirect('/sewa_podcast')->with(['success'    =>  'Selamat, Pendaftaran sewa ruang podcast Berhasil, Silahkan Tunggu Konfirmasi Pendaftaran Anda']);
        }

    }
}


