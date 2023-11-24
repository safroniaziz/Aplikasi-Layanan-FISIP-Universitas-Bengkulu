<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananRuangan;

class DaftarSewaRuangan extends Controller
{
    public function index()
    {
        $PemesananRuangan = PemesananRuangan::with('user')->where('deleted_at', NULL)->get();
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
            return redirect()->route('sewaRuangan');

        } else {
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, konfirmasi Gagal '], 422);
        }
    }

    public function delete(PemesananRuangan $sewaRuangan)
    {
        $delete = $sewaRuangan->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay,   Berhasil dihapus',
                'url'   =>  url('/daftar_sewa_ruangan/'),
            ]);
        } else {
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Gagal dihapus'], 422);
        }
    }
}
