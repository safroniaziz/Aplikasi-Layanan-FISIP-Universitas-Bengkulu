<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MahasiswaController extends Controller
{
    public function index(){
        $prodis = ProgramStudi::withCount('mahasiswas')->get();
        return view('backend/mahasiswas.index',[
            'prodis'  =>  $prodis,
        ]);
    }

    public function detail(ProgramStudi $prodi){
        $mahasiswas = Mahasiswa::where('prodi_kode',$prodi->kode)->get();
        return view('backend.Mahasiswas.detail',[
            'prodi' =>  $prodi,
            'mahasiswas' =>  $mahasiswas,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'npm'                     => 'required|unique:mahasiswas',
            'nama_mahasiswa'          => 'required',
        ];

        $text = [
            'npm.required'             => 'NPM harus diisi.',
            'npm.unique'               => 'NPM sudah digunakan, harap pilih NPM lain.',
            'nama_mahasiswa.required'  => 'Nama mahasiswa harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = Mahasiswa::create([
            'npm'                 =>  $request->npm,
            'prodi_kode'          =>  $request->prodiKode,
            'nama_mahasiswa'      =>  $request->nama_mahasiswa,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Mahasiswa Berhasil Ditambahkan',
                'url'   =>  route('mahasiswa.detail',[$request->prodiKode]),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Mahasiswa Gagal Ditambahkan'],422);
        }
    }

    public function edit(Mahasiswa $mahasiswa){
        return $mahasiswa;
    }

    public function update(Request $request){
        $rules = [
            'nama_mahasiswa'          => 'required',
        ];

        $text = [
            'nama_mahasiswa.required'  => 'Nama mahasiswa harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = Mahasiswa::where('npm',$request->npm)->update([
            'nama_mahasiswa'      =>  $request->nama_mahasiswa,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Mahasiswa Berhasil Diubah',
                'url'   =>  route('mahasiswa.detail',[$request->prodiKode]),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Mahasiswa Gagal Diubah'],422);
        }
    }

    public function delete(Request $request, Mahasiswa $mahasiswa){
        $delete = Mahasiswa::where('npm',$mahasiswa->npm)->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Mahasiswa Berhasil dihapus',
                'url'   =>  route('mahasiswa.detail',[$request->prodiKode]),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Mahasiswa Gagal dihapus'],422);
        }
    }
}
