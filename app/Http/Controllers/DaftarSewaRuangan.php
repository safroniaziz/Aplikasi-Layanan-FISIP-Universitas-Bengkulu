<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananRuangan;

class DaftarSewaRuangan extends Controller
{
    public function index()
    {
        $PemesananRuangan = PemesananRuangan::with('user')->get();
        return view('backend/sewa_ruangan.index', [
            'PemesananRuangan'  =>  $PemesananRuangan,
        ]);
    }

    public function konfirmasi(Request $request)
    {
        $update = PemesananRuangan::where('id', $request->sewaRuangan)->update([ 'status'  =>  1  ]);
        $pemesanan = PemesananRuangan::with(['user'])->where('id',$request->sewaRuangan)->first();
        if ($update) {
            $target = $pemesanan->user->no_hp;
            $token = "VUPG2eveV7sG+9ZzEIMz";
            $messageController = new WaController();
            $message = "Halo '".$pemesanan->user->name."', Permohonan sewa ruangan telah disetujui oleh admin, silahkan datang ke fakultas ilmu sosial dan politik universitas bengkulu untuk informasi lebih lanjut";
            $response = $messageController->sendWa($token, $target, $message);
            // return response()->json([
            //     'text'  =>  'Berhasil konfirmasi Pemesanan Ruangan',
            //     'url'   =>  route('sewaRuangan' ),
            // ]);
            return redirect()->route('sewaRuangan');;

        } else {
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, konfirmasi Gagal '], 422);
        }
    }
}
