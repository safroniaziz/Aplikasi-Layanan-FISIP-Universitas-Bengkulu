<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MahasiswaMataKuliah;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaMataKuliahController extends Controller
{
    public function index(){
        $mataKuliahs = MataKuliah::all();
        $mahasiswas = Mahasiswa::all();
        $mahasiswaMataKuliahs = MahasiswaMataKuliah::all();
        return view('backend/mahasiswaMataKuliahs.index',[
            'mahasiswaMataKuliahs'  =>  $mahasiswaMataKuliahs,
            'mataKuliahs' =>  $mataKuliahs,
            'mahasiswas' =>  $mahasiswas,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'mata_kuliah_id' => 'required',
            'mahasiswa_npm' => 'required',
        ];

        $text = [
            'mata_kuliah_id.required' => 'Mata Kuliah Id harus diisi.',
            'mahasiswa_npm.required' => 'Npm mahasiswa harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = MahasiswaMataKuliah::create([
            'mata_kuliah_id'                 =>  $request->mata_kuliah_id,
            'mahasiswa_npm'                  =>  $request->mahasiswa_npm,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Mahasiswa Mata Kuliah Berhasil Ditambahkan',
                'url'   =>  url('/mahasiswa_mata_kuliah/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Mahasiswa Mata Kuliah Gagal Ditambahkan'],422);
        }
    }

    public function edit(MahasiswaMataKuliah $mahasiswaMataKuliah){
        return $mahasiswaMataKuliah;
    }

    public function update(Request $request){
        $rules = [
            'mata_kuliah_id' => 'required',
            'mahasiswa_npm' => 'required',
        ];

        $text = [
            'mata_kuliah_id.required' => 'Mata Kuliah Id harus diisi.',
            'mahasiswa_npm.required' => 'Npm mahasiswa harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = MahasiswaMataKuliah::where('id',$request->id)->update([
            'mata_kuliah_id'                 =>  $request->mata_kuliah_id,
            'mahasiswa_npm'                  =>  $request->mahasiswa_npm,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Mahasiswa Mata Kuliah Berhasil Diubah',
                'url'   =>  url('/mahasiswa_mata_kuliah/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Mahasiswa Mata Kuliah Gagal Diubah'],422);
        }
    }

    public function delete(MahasiswaMataKuliah $mahasiswaMataKuliah){
        $delete = MahasiswaMataKuliah::where('id',$mahasiswaMataKuliah->id)->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Mahasiswa Mata Kuliah Berhasil dihapus',
                'url'   =>  url('/mahasiswa_mata_kuliah/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Mahasiswa Mata Kuliah Gagal dihapus'],422);
        }
    }
}
