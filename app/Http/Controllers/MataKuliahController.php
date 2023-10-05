<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MataKuliahController extends Controller
{
    public function index(){
        $prodis = ProgramStudi::all();
        $mataKuliahs = MataKuliah::all();
        return view('backend/mataKuliahs.index',[
            'mataKuliahs'  =>  $mataKuliahs,
            'prodis' =>  $prodis,
        ]);
    }

    public function create(){
        return view('backend.mataKuliahs.create');
    }

    public function store(Request $request){
        $rules = [
            'prodi_kode'         => 'required',
            'nama_mata_kuliah'   => 'required',
            'kode_mata_kuliah'   => 'required',
            'sks'   => 'required|numeric',
            'semester'   => 'required|numeric',
        ];

        $text = [
            'prodi_kode.required'   => 'Prodi Kode harus diisi.',
            'nama_mata_kuliah.required' => 'Nama mata kuliah harus diisi.',
            'kode_mata_kuliah.required' => 'Kode mata kuliah harus diisi.',
            'sks.required' => 'SKS harus diisi.',
            'sks.numeric' => 'SKS harus berupa angka.',
            'semester.required' => 'Semester harus diisi.',
            'semester.numeric' => 'Semester harus berupa angka.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = MataKuliah::create([
            'prodi_kode'             =>  $request->prodi_kode,
            'nama_mata_kuliah'       =>  $request->nama_mata_kuliah,
            'kode_mata_kuliah'       =>  $request->kode_mata_kuliah,
            'sks'       =>  $request->sks,
            'semester'       =>  $request->semester,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Mata Kuliah Berhasil Ditambahkan',
                'url'   =>  url('/mata_kuliah/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Mata Kuliah Gagal Ditambahkan'],422);
        }
    }

    public function edit(MataKuliah $mataKuliah){
        return $mataKuliah;
    }

    public function update(Request $request){
        $rules = [
            'prodi_kode'         => 'required',
            'nama_mata_kuliah'   => 'required',
            'kode_mata_kuliah'   => 'required',
            'sks'   => 'required|numeric',
            'semester'   => 'required|numeric',
        ];

        $text = [
            'prodi_kode.required'   => 'Prodi Kode harus diisi.',
            'nama_mata_kuliah.required' => 'Nama mata kuliah harus diisi.',
            'kode_mata_kuliah.required' => 'Kode mata kuliah harus diisi.',
            'sks.required' => 'SKS harus diisi.',
            'sks.numeric' => 'SKS harus berupa angka.',
            'semester.required' => 'Semester harus diisi.',
            'semester.numeric' => 'Semester harus berupa angka.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = MataKuliah::where('id',$request->mata_kuliah_id)->update([
            'prodi_kode'           =>  $request->prodi_kode,
            'nama_mata_kuliah'     =>  $request->nama_mata_kuliah,
            'kode_mata_kuliah'     =>  $request->kode_mata_kuliah,
            'sks'       =>  $request->sks,
            'semester'       =>  $request->semester,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Mata Kuliah Berhasil Diubah',
                'url'   =>  url('/mata_kuliah/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Mata Kuliah Gagal Diubah'],422);
        }
    }

    public function delete(MataKuliah $mataKuliah){
        $delete = $mataKuliah->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Mata Kuliah Berhasil dihapus',
                'url'   =>  url('/mata_kuliah/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Mata Kuliah Gagal dihapus'],422);
        }
    }
}
