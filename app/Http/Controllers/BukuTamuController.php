<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BukuTamuController extends Controller
{
    public function index(){
        return view('frontend.buku_tamu');
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
            $tanggal = date('Y-m-d');
            $tanggalJam = date('Y-m-d H:i:s');
            $keperluan = $request->input('keperluan');
            $tujuan = $request->input('tujuan');
            $noHp = $request->input('no_hp');

            // Buat path lengkap untuk penyimpanan
            $filePath = "buku_tamu/$tanggal/";

            // Buat nama file unik dengan menggabungkan nama tamu dan waktu saat ini
            $fileName = $namaTamu . '_' . time() . '.jpg';

            // Gabungkan path dan nama file
            $fullPath = $filePath . $fileName;
            
            Storage::disk('public')->put($fullPath, $imageData);

            // Simpan nama file ke database (jika diperlukan)
            $imageModel = new BukuTamu();
            $imageModel->tanggal = $tanggalJam;
            $imageModel->nama_tamu = $namaTamu;
            $imageModel->keperluan = $keperluan;
            $imageModel->tujuan = $tujuan;
            $imageModel->no_hp = $noHp;
            $imageModel->foto = $fullPath;
            $imageModel->save();

            return redirect()->route('bukuTamu')->with(['success'   =>  'Data tersimpan, terimakasih']);
        }
        else{
            return redirect()->route('bukuTamu')->with(['success'   =>  'Data tersimpan, coba lagi !!!']);
        }
    }
}