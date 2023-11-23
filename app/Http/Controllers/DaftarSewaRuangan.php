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

        if ($update) {
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
