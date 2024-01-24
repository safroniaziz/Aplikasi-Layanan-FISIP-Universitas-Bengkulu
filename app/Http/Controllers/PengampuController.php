<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Pengampu;
use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class PengampuController extends Controller
{
    public function index(){
        if (!Gate::allows('pengampu')) {
            abort(403);
        }
        $mataKuliahs = MataKuliah::all();
        $dosens = Dosen::all();
        $pengampus = Pengampu::all();
        $prodis = ProgramStudi::all();
        return view('backend/pengampus.index',[
            'pengampus'  =>  $pengampus,
            'mataKuliahs' =>  $mataKuliahs,
            'dosens' =>  $dosens,
            'prodis' =>  $prodis,
        ]);
    }

    public function create(){
        return view('backend.pengampu.create');
    }

    public function store(Request $request){
        $rules = [
            'mata_kuliah_id'    => 'required',
            'dosen_nip'         => 'required',
            'is_active'         => 'required',
        ];

        $text = [
            'mata_kuliah_id.required'   => 'Mata Kuliah Id harus diisi.',
            'dosen_nip.required'        => 'NIP Dosen harus diisi.',
            'is_active.required'        => 'Status aktif harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = Pengampu::create([
            'mata_kuliah_id'       =>  $request->mata_kuliah_id,
            'dosen_nip'       =>  $request->dosen_nip,
            'is_active'     =>  $request->is_active,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Pengampu Berhasil Ditambahkan',
                'url'   =>  url('/pengampu/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Pengampu Gagal Ditambahkan'],422);
        }
    }

    public function edit(Pengampu $pengampu){
        return $pengampu;
    }

    public function update(Request $request){
        $rules = [
            'mata_kuliah_id'    => 'required',
            'dosen_nip'         => 'required',
            'is_active'         => 'required',
        ];

        $text = [
            'mata_kuliah_id.required'   => 'Mata Kuliah Id harus diisi.',
            'dosen_nip.required'        => 'NIP Dosen harus diisi.',
            'is_active.required'        => 'Status aktif harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = Pengampu::where('id',$request->id)->update([
            'mata_kuliah_id'  =>  $request->mata_kuliah_id,
            'dosen_nip'     =>  $request->dosen_nip,
            'is_active'     =>  $request->is_active,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Pengampu Berhasil Diubah',
                'url'   =>  url('/pengampu/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Pengampu Gagal Diubah'],422);
        }
    }

    public function delete(Pengampu $pengampu){
        $delete = $pengampu->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Pengampu Berhasil dihapus',
                'url'   =>  url('/pengampu/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Pengampu Gagal dihapus'],422);
        }
    }
}
