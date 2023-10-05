<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MataKuliahController extends Controller
{
    public function index(){
        $prodis = ProgramStudi::withCount('mataKuliahs')->get();
        return view('backend/mataKuliahs.index',[
            'prodis' =>  $prodis,
        ]);
    }

    public function detail(ProgramStudi $prodi){
        $mataKuliahs = MataKuliah::where('prodi_kode',$prodi->kode)->orderBy('created_at','desc')->get();
        return view('backend.mataKuliahs.detail',[
            'prodi' =>  $prodi,
            'mataKuliahs' =>  $mataKuliahs,
        ]);
    }

    public function create(){
        return view('backend.mataKuliahs.create');
    }

    public function store(Request $request){
        $rules = [
            'nama_mata_kuliah'   => 'required',
            'kode_mata_kuliah'   => 'required',
            'sks'   => 'required|numeric',
            'semester'   => 'required|numeric',
            'keterangan'   => 'required',
        ];

        $text = [
            'nama_mata_kuliah.required' => 'Nama mata kuliah harus diisi.',
            'kode_mata_kuliah.required' => 'Kode mata kuliah harus diisi.',
            'sks.required' => 'SKS harus diisi.',
            'sks.numeric' => 'SKS harus berupa angka.',
            'semester.required' => 'Semester harus diisi.',
            'semester.numeric' => 'Semester harus berupa angka.',
            'keterangan.required' => 'Keterangan harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = MataKuliah::create([
            'prodi_kode'             =>  $request->prodiKode,
            'nama_mata_kuliah'       =>  $request->nama_mata_kuliah,
            'kode_mata_kuliah'       =>  $request->kode_mata_kuliah,
            'sks'       =>  $request->sks,
            'semester'       =>  $request->semester,
            'keterangan'       =>  $request->keterangan,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Mata Kuliah Berhasil Ditambahkan',
                'url'   =>  route('mataKuliah.detail',[$request->prodiKode]),
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
            'nama_mata_kuliah'   => 'required',
            'kode_mata_kuliah'   => 'required',
            'sks'   => 'required|numeric',
            'semester'   => 'required|numeric',
            'keterangan'   => 'required',
        ];

        $text = [
            'nama_mata_kuliah.required' => 'Nama mata kuliah harus diisi.',
            'kode_mata_kuliah.required' => 'Kode mata kuliah harus diisi.',
            'sks.required' => 'SKS harus diisi.',
            'sks.numeric' => 'SKS harus berupa angka.',
            'semester.required' => 'Semester harus diisi.',
            'semester.numeric' => 'Semester harus berupa angka.',
            'keterangan.required' => 'Keterangan harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = MataKuliah::where('id',$request->mata_kuliah_id)->update([
            'nama_mata_kuliah'     =>  $request->nama_mata_kuliah,
            'kode_mata_kuliah'     =>  $request->kode_mata_kuliah,
            'sks'       =>  $request->sks,
            'semester'       =>  $request->semester,
            'keterangan'       =>  $request->keterangan,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Mata Kuliah Berhasil Diubah',
                'url'   =>  route('mataKuliah.detail',[$request->prodiKode]),
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
