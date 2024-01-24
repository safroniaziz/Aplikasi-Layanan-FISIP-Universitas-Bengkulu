<?php

namespace App\Http\Controllers;

use App\Models\RuanganKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;


class RuanganKelasController extends Controller
{
    public function index(){
        if (!Gate::allows('ruanganKelas')) {
            abort(403);
        }
        $ruanganKelas = RuanganKelas::all();
        return view('backend/ruanganKelas.index',[
            'ruanganKelas'  =>  $ruanganKelas,
        ]);
    }

    public function create(){
        return view('backend.ruanganKelas.create');
    }

    public function store(Request $request){
        $rules = [
            'nama_ruangan_kelas'    => 'required',
        ];

        $text = [
            'nama_ruangan_kelas.required'   => 'Nama Ruangan Kelas harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create =RuanganKelas::create([
            'nama_ruangan_kelas'       =>  $request->nama_ruangan_kelas,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Ruangan Kelas Berhasil Ditambahkan',
                'url'   =>  url('/ruangan_kelas/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Ruangan Kelas Gagal Ditambahkan'],422);
        }
    }

    public function edit(RuanganKelas $ruanganKelas){
        return $ruanganKelas;
    }

    public function update(Request $request){
        $rules = [
            'nama_ruangan_kelas'    => 'required',
        ];

        $text = [
            'nama_ruangan_kelas.required'   => 'Nama Ruangan Kelas harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = RuanganKelas::where('id',$request->id)->update([
            'nama_ruangan_kelas'  =>  $request->nama_ruangan_kelas,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Ruangan Kelas Berhasil Diubah',
                'url'   =>  url('/ruangan_kelas/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Ruangan Kelas Gagal Diubah'],422);
        }
    }

    public function delete(RuanganKelas $ruanganKelas){
        $delete = $ruanganKelas->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Ruangan Kelas Berhasil dihapus',
                'url'   =>  url('/ruangan_kelas/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Ruangan Kelas Gagal dihapus'],422);
        }
    }
}
