<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananRuangan;
use Illuminate\Support\Facades\Gate;

class DaftarSewaRuangan extends Controller
{
    public function index()
    {
        if (!Gate::allows('sewaRuangan')) {
            abort(403);
        }
        $PemesananRuangan = PemesananRuangan::with('user')->where('deleted_at', NULL)->get();
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
            $token = "vp2sn#edisDCEdeRLbxP";
            $messageController = new WaController();
            $message = "Halo '".$pemesanan->user->name."', Permohonan sewa ruangan telah disetujui oleh admin, silahkan datang ke fakultas ilmu sosial dan politik universitas bengkulu untuk informasi lebih lanjut";
            $response = $messageController->sendWa($token, $target, $message);
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
