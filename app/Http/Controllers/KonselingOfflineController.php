<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranKonseling;
use Illuminate\Support\Facades\Validator;

class KonselingOfflineController extends Controller
{
    public function index(){
        $konselingOfflines = PendaftaranKonseling::orderBy('created_at','desc')->paginate(10);
        return view('backend.konselingOffline.index',[
            'konselingOfflines'  =>  $konselingOfflines
        ]);
    }

    public function verify(Request $request){
        $rules = [
            'tanggal_mulai'   => 'required',
            'tanggal_selesai' => 'required',
            'waktu_mulai'             => 'required',
            'waktu_selesai'    => 'required',
        ];

        $text = [
            'tanggal_mulai.required'      => 'Tanggal Mulai harus diisi.',
            'tanggal_selesai.required'      => 'Tanggal Mulai harus diisi.',
            'waktu_mulai.required'      => 'Waktu Mulai harus diisi.',
            'waktu_selesai.required'    => 'Waktu Selesai harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $konselingOffline = PendaftaranKonseling::where('id',$request->id)->first();

        $update = $konselingOffline->update([
            'tanggal_dan_waktu_mulai' => $request->tanggal_mulai.' '. $request->waktu_mulai,
            'tanggal_dan_waktu_selesai' => $request->tanggal_selesai.' '. $request->waktu_selesai,
            'status'    =>  'terjadwal',
        ]);

        if ($update) {
            $target = $konselingOffline->user->no_hp;
            $token = "VUPG2eveV7sG+9ZzEIMz";
            $messageController = new WaController();
            $message = "Halo '".$konselingOffline->user->name."', Permohonan Konseling telah disetujui oleh admin, jadwal anda adalah pada tanggal '".$request->tanggal_mulai."' pukul '".$request->waktu_mulai."' - '".$request->tanggal_selesai."' pukul '".$request->waktu_selesai."', silahkan hubungi operator melalui live chat untuk informasi lebih lanjut";
            $response = $messageController->sendWa($token, $target, $message);
            return response()->json([
                'text'  =>  'Yeay, Verifikasi Berhasil',
                'url'   => route('konselingOffline'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Verifikasi Gagal'],422);
        }
    }
}
