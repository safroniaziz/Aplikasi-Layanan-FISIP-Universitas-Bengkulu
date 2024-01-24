<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ProgramStudiController extends Controller
{
    public function index(){
        if (!Gate::allows('programStudi')) {
            abort(403);
        }
        $programStudis = ProgramStudi::all();
        return view('backend/programStudis.index',[
            'programStudis'  =>  $programStudis,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'nama_prodi'        => 'required',
            'kode'              => 'required|unique:program_studis',
            'nama_fakultas'     => 'required',
        ];

        $text = [
            'nama.required'             => 'Nama Prodi harus diisi',
            'kode.required'             => 'Kode Prodi harus diisi',
            'kode.unique'               => 'Kode Prodi sudah digunakan',
            'nama_fakultas.required'    => 'Nama Fakultas harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = ProgramStudi::create([
            'nama_prodi'    =>  $request->nama_prodi,
            'kode'          =>  $request->kode,
            'nama_fakultas' =>  $request->nama_fakultas,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Program Studi Berhasil Ditambahkan',
                'url'   =>  url('/program_studi/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Program Studi Gagal Ditambahkan'],422);
        }
    }

    public function edit(ProgramStudi $programStudi){
        return $programStudi;
    }

    public function update(Request $request){
        $rules = [
            'nama_prodi'        => 'required',
            'nama_fakultas'     => 'required',
        ];

        $text = [
            'nama_prodi.required'       => 'Nama Prodi harus diisi',
            'nama_fakultas.required'    => 'Nama Fakultas harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = ProgramStudi::where('kode',$request->kode)->update([
            'nama_prodi'    =>  $request->nama_prodi,
            'nama_fakultas' =>  $request->nama_fakultas,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Program Studi Berhasil Diubah',
                'url'   =>  url('/program_studi/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Program Studi Gagal Diubah'],422);
        }
    }

    public function delete(ProgramStudi $programStudi){
        $delete = ProgramStudi::where('kode',$programStudi->kode)->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Program Studi Berhasil dihapus',
                'url'   =>  url('/program_studi/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Program Studi Gagal dihapus'],422);
        }
    }
}
