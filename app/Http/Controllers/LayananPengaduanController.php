<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengaduan;
use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LayananPengaduanController extends Controller
{
    public function index(){
        $units = Unit::all();
        return view('frontend.pengaduan',[
            'units' =>  $units,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'unit_id'           => 'required',
            'pokok_permasalahan'    => 'required',
            'bukti_pendukung'       => 'file|mimes:pdf|max:2048', // Menambahkan validasi file PDF maksimal 2 MB
        ];

        $text = [
            'unit_id.required'         => 'Unit Tujuan harus diisi.',
            'pokok_permasalahan.required'  => 'Pokok Permasalahan harus diisi.',
            'bukti_pendukung.file'         => 'Bukti Pendukung harus berupa file.',
            'bukti_pendukung.mimes'        => 'Bukti Pendukung harus berupa file PDF.',
            'bukti_pendukung.max'          => 'Ukuran Bukti Pendukung tidak boleh melebihi 2 MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $text);

        // Jika validasi gagal, kembalikan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $kodeUnik = Str::random(6) . mt_rand(100000, 999999);

        $pengaduan = [
            'user_id'   =>  Auth::user()->id,
            'unit_id'   =>  $request->unit_id,
            'tanggal'   =>  Carbon::now(),
            'pokok_permasalahan'   =>  $request->pokok_permasalahan,
            'tiket_pengaduan'       =>  $kodeUnik,
        ];

        if ($request->hasFile('bukti_pendukung')) {
            $file = $request->file('bukti_pendukung');
            $fileName = $file->store('bukti_pendukungs', 'public');
            $pengaduan['bukti_pendukung'] = $fileName;
        }

        $create = Pengaduan::create($pengaduan);

        if ($create) {
            $target = Auth::user()->no_hp;
            $token = "GnqX5TyqEf8xGuLnroy-";
            $messageController = new WaController();
            $message = "Halo '".Auth::user()->name."', Pengaduan anda sudah terkirim, berikut adalah tiket pengaduan anda : ".$kodeUnik;
            $response = $messageController->sendWa($token, $target, $message);
            return redirect()->route('layanan_pengaduan')->with(['success'  =>  $message]);
        }
    }

    public function cariNomorTiket(Request $request){
        $pengaduan = Pengaduan::where('tiket_pengaduan',$request->nomorTiket)->first();
        return $pengaduan;
    }
}
