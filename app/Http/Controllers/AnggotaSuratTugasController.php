<?php

namespace App\Http\Controllers;

use App\Models\SuratTugas;
use Illuminate\Http\Request;
use App\Models\AnggotaSuratTugas;
use Illuminate\Support\Facades\Validator;

class AnggotaSuratTugasController extends Controller
{
    public function index(SuratTugas $suratTugas){
        $anggotas = AnggotaSuratTugas::where('surat_tugas_id',$suratTugas->id)->get();
        return view('backend.anggotaSuratTugas.index', [
            'suratTugas'    =>  $suratTugas,
            'anggotas'    =>  $anggotas,
        ]);
    }

    public function store(Request $request, SuratTugas $suratTugas){
        $rules = [
            'nama_yang_bertugas' => 'required',
            'keterangan_tugas' => 'required',
        ];

        $text = [
            'nama_yang_bertugas.required'  => 'Nama Yang Bertugas harus diisi.',
            'keterangan_tugas.required'  => 'Keterangan Tugas harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = AnggotaSuratTugas::create([
            'surat_tugas_id'    =>  $suratTugas->id,
            'nama_yang_bertugas'       =>  $request->nama_yang_bertugas,
            'keterangan_tugas'       =>  $request->keterangan_tugas,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Anggota Kegiatan Berhasil Ditambahkan',
                'url'   =>  route('suratTugas.anggota',[$suratTugas->id]),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Anggota Kegiatan Gagal Ditambahkan'],422);
        }
    }

    public function edit(AnggotaSuratTugas $anggota){
        return $anggota;
    }

    public function update(Request $request, SuratTugas $suratTugas){
        $rules = [
            'nama_yang_bertugas' => 'required',
            'keterangan_tugas' => 'required',
        ];

        $text = [
            'nama_yang_bertugas.required'  => 'Nama Yang Bertugas harus diisi.',
            'keterangan_tugas.required'  => 'Keterangan Tugas harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = AnggotaSuratTugas::where('id',$request->id)->update([
            'surat_tugas_id'    =>  $suratTugas->id,
            'nama_yang_bertugas'       =>  $request->nama_yang_bertugas,
            'keterangan_tugas'       =>  $request->keterangan_tugas,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Anggota Kegiatan Berhasil Diubah',
                'url'   =>  route('suratTugas.anggota',[$suratTugas->id]),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Anggota Kegiatan Gagal Diubah'],422);
        }
    }

    public function delete(SuratTugas $suratTugas, AnggotaSuratTugas $anggota){
        $delete = $anggota->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, anggota Berhasil dihapus',
                'url'   =>  route('suratTugas.anggota',[$suratTugas->id]),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, anggota Gagal dihapus'],422);
        }
    }
}
