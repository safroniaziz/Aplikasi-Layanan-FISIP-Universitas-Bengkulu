<?php

namespace App\Http\Controllers;

use App\Models\JadwalPerkuliahan;
use App\Models\MataKuliah;
use App\Models\RuanganKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalPerkuliahanController extends Controller
{
    public function index(){
        $mataKuliahs = MataKuliah::all();
        $ruanganKelas = RuanganKelas::all();
        $jadwalPerkuliahans = JadwalPerkuliahan::all();
        
        return view('backend/jadwalPerkuliahans.index',[
            'jadwalPerkuliahans'  =>  $jadwalPerkuliahans,
            'mataKuliahs'  =>  $mataKuliahs,
            'ruanganKelas'  =>  $ruanganKelas,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'mata_kuliah_id'   => 'required',
            'ruangan_kelas_id' => 'required',
            'hari'             => 'required',
            'waktu_mulai'      => 'required|numeric',
            'waktu_selesai'    => 'required|numeric',
        ];

        $text = [
            'mata_kuliah_id.required'   => 'Mata Kuliah Id harus diisi.',
            'ruangan_kelas_id.required' => 'Ruangan Kelas Id harus diisi.',
            'hari.required'             => 'Hari harus diisi.',
            'waktu_mulai.required'      => 'Waktu Mulai harus diisi.',
            'waktu_mulai.numeric'       => 'Waktu Mulai harus berupa angka.',
            'waktu_selesai.required'    => 'Waktu Selesai harus diisi.',
            'waktu_selesai.numeric'     => 'Waktu Selesai harus berupa angka.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create =JadwalPerkuliahan::create([
            'mata_kuliah_id'    =>  $request->mata_kuliah_id,
            'ruangan_kelas_id'  =>  $request->ruangan_kelas_id,
            'hari'              =>  $request->hari,
            'waktu_mulai'       =>  $request->waktu_mulai,
            'waktu_selesai'     =>  $request->waktu_selesai,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Jadwal Perkuliahan Berhasil Ditambahkan',
                'url'   =>  url('/jadwal_perkuliahan/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Jadwal Perkuliahan Gagal Ditambahkan'],422);
        }
    }

    public function edit(JadwalPerkuliahan $jadwalPerkuliahan){
        return $jadwalPerkuliahan;
    }

    public function update(Request $request){
        $rules = [
            'mata_kuliah_id'   => 'required',
            'ruangan_kelas_id' => 'required',
            'hari'             => 'required',
            'waktu_mulai'      => 'required|numeric',
            'waktu_selesai'    => 'required|numeric',
        ];

        $text = [
            'mata_kuliah_id.required'   => 'Mata Kuliah Id harus diisi.',
            'ruangan_kelas_id.required' => 'Ruangan Kelas Id harus diisi.',
            'hari.required'             => 'Hari harus diisi.',
            'waktu_mulai.required'      => 'Waktu Mulai harus diisi.',
            'waktu_mulai.numeric'       => 'Waktu Mulai harus berupa angka.',
            'waktu_selesai.required'    => 'Waktu Selesai harus diisi.',
            'waktu_selesai.numeric'     => 'Waktu Selesai harus berupa angka.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = JadwalPerkuliahan::where('id',$request->id)->update([
            'mata_kuliah_id'    =>  $request->mata_kuliah_id,
            'ruangan_kelas_id'  =>  $request->ruangan_kelas_id,
            'hari'              =>  $request->hari,
            'waktu_mulai'       =>  $request->waktu_mulai,
            'waktu_selesai'     =>  $request->waktu_selesai,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Jadwal Perkuliahan Berhasil Diubah',
                'url'   =>  url('/jadwal_perkuliahan/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Jadwal Perkuliahan Gagal Diubah'],422);
        }
    }

    public function delete(JadwalPerkuliahan $jadwalPerkuliahan){
        $delete = $jadwalPerkuliahan->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Jadwal Perkuliahan Berhasil dihapus',
                'url'   =>  url('/jadwal_perkuliahan/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Jadwal Perkuliahan Gagal dihapus'],422);
        }
    }
}
