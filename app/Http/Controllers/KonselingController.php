<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasisPengetahuan;
use App\Models\PendaftaranKonseling;
use Illuminate\Support\Facades\Auth;

class KonselingController extends Controller
{
    public function index()
    {
        $basisPengetahuans = BasisPengetahuan::all();
        $pendaftaran = PendaftaranKonseling::where('user_id', Auth::user()->id)->get();

        return view('frontend.konseling', [
            'pendaftaran'  =>  $pendaftaran,
            'basisPengetahuans'  =>  $basisPengetahuans,
        ]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'tgl_start' => ['required'],
        //     'tgl_end' => ['required'],
        //     'waktu_start' => ['required'],
        //     'waktu_end' => ['required'],
        // ]);

        $save = PendaftaranKonseling::create([
            'user_id' => $request->user_id,
            // 'tanggal_dan_waktu_mulai' => $request->tgl_start.' '. $request->waktu_start,
            // 'tanggal_dan_waktu_selesai' => $request->tgl_end.' '. $request->waktu_end,
            'status' => 'menunggu',
            'deskripsi' => $request->deskripsi,
        ]);

        if ($save) {
            return redirect('/e_konseling')->with(['success'    =>  'Selamat, Pendaftaran E-Konseling Berhasil, Silahkan Tunggu Konfirmasi Pendaftaran Anda']);
        }
    }
}
