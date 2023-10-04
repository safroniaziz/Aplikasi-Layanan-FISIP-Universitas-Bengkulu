<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProgramStudi;

class DosenController extends Controller
{
    public function index(){
        $prodis = ProgramStudi::all();
        $dosens = Dosen::all();
        return view('backend/dosens.index',[
            'dosens'  =>  $dosens,
            'prodis' =>  $prodis,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'nip'         => 'required|unique:dosens|numeric',
            'prodi_kode'  => 'required',
            'nama_dosen'  => 'required',
        ];

        $text = [
            'nip.required'      => 'NIP harus diisi.',
            'nip.unique'        => 'NIP sudah digunakan, harap pilih NIP lain.',
            'prodi_kode.required' => 'Kode prodi harus diisi.',
            'nama_dosen.required' => 'Nama dosen harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = Dosen::create([
            'nip'                 =>  $request->nip,
            'prodi_kode'          =>  $request->prodi_kode,
            'nama_dosen'          =>  $request->nama_dosen,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Dosen Berhasil Ditambahkan',
                'url'   =>  url('/dosen/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Dosen Gagal Ditambahkan'],422);
        }
    }

    public function edit(Dosen $dosen){
        return $dosen;
    }

    public function update(Request $request){
        $rules = [
            'prodi_kode'  => 'required',
            'nama_dosen'  => 'required',
        ];

        $text = [
            'prodi_kode.required' => 'Kode prodi harus diisi.',
            'nama_dosen.required' => 'Nama dosen harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = Dosen::where('nip',$request->nip)->update([
            'prodi_kode'          =>  $request->prodi_kode,
            'nama_dosen'      =>  $request->nama_dosen,

        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Dosen Berhasil Diubah',
                'url'   =>  url('/dosen/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Dosen Gagal Diubah'],422);
        }
    }

    public function delete(Dosen $dosen){
        $delete = Dosen::where('nip',$dosen->nip)->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Dosen Berhasil dihapus',
                'url'   =>  url('/dosen/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Dosen Gagal dihapus'],422);
        }
    }
}
