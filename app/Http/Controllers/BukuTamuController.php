<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Pegawai;
use App\Models\BukuTamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BukuTamuController extends Controller
{
    public function index(){
        $dosens = Dosen::select('nip','nama_dosen as nama');
        $pegawais = Pegawai::select('nip','nama_pegawai as nama');
        $pegawai_gabungan = $dosens->union($pegawais)->get();
        return view('frontend.buku_tamu',[
            'pegawais'  =>  $pegawai_gabungan,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'nama_tamu' => 'required',
            'keperluan' => 'required',
            'tujuan'    => 'required',
            'no_hp'     => 'required',
            'foto'      => 'required', // Pastikan gambar telah diunggah
        ];

        $text = [
            'nama_tamu.required' => 'Nama Tamu harus diisi.',
            'keperluan.required' => 'Keperluan harus diisi.',
            'tujuan.required'    => 'Tujuan harus diisi.',
            'no_hp.required'     => 'Nomor HP harus diisi.',
            'foto.required'      => 'Foto harus diunggah.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $base64Image = $request->input('foto');
        if ($base64Image) {
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
            $namaTamu = $request->input('nama_tamu');
            $tanggalJam = now();
            $keperluan = $request->input('keperluan');
            $tujuan = $request->input('tujuan');
            $noHp = $request->input('no_hp');
            $token = "HdZhqyzS@vEY9w83GnE4";

            $target = null;

            if ($dosen = Dosen::where('nip', $tujuan)->first()) {
                $target = $dosen->no_hp;
                $nm = $dosen->nama_dosen;
            } elseif ($pegawai = Pegawai::where('nip', $tujuan)->first()) {
                $target = $pegawai->no_hp;
                $nm = $dosen->nama_pegawai;
            }

            // Simpan gambar
            $tanggal = $tanggalJam->format('Y-m-d');
            $filePath = "buku_tamu/$tanggal/";
            $fileName = $namaTamu . '_' . time() . '.jpg';
            $fullPath = $filePath . $fileName;
            Storage::disk('public')->put($fullPath, $imageData);

            // Simpan data ke database
            $imageModel = new BukuTamu();
            $imageModel->tanggal = $tanggalJam;
            $imageModel->nama_tamu = $namaTamu;
            $imageModel->keperluan = $keperluan;
            $imageModel->tujuan = $tujuan;
            $imageModel->no_hp = $noHp;
            $imageModel->foto = $fullPath;
            $imageModel->save();

            if ($target) {
                // Kirim pesan WhatsApp
                $messageController = new WaController();
                $message = "Halo $nm, $namaTamu ingin bertamu dengan anda dengan keperluan $keperluan";
                $response = $messageController->sendWa($token, $target, $message);
            }
            return redirect()->route('bukuTamu')->with(['success' => 'Data tersimpan, terimakasih']);
        }
        else{
            return redirect()->route('bukuTamu')->with(['success'   =>  'Data tersimpan, coba lagi !!!']);
        }
    }
}
