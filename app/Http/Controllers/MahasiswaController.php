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
            'prodi_kode'              => 'required',
            'nama_mahasiswa'          => 'required',
        ];

        $text = [
            'npm.required'             => 'NPM harus diisi.',
            'npm.unique'               => 'NPM sudah digunakan, harap pilih NPM lain.',
            'prodi_kode.required'      => 'Kode prodi harus diisi.',
            'nama_mahasiswa.required'  => 'Nama mahasiswa harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = Mahasiswa::create([
            'npm'                 =>  $request->npm,
            'prodi_kode'          =>  $request->prodi_kode,
            'nama_mahasiswa'      =>  $request->nama_mahasiswa,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Mahasiswa Berhasil Ditambahkan',
                'url'   =>  url('/mahasiswa/'),
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
            'prodi_kode'              => 'required',
            'nama_mahasiswa'          => 'required',
        ];

        $text = [
            'prodi_kode.required'      => 'Kode prodi harus diisi',
            'prodi_kode.unique'        => 'Kode prodi sudah digunakan, harap pilih kode prodi lain',
            'nama_mahasiswa.required'  => 'Nama mahasiswa harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = Mahasiswa::where('npm',$request->npm)->update([
            'prodi_kode'          =>  $request->prodi_kode,
            'nama_mahasiswa'      =>  $request->nama_mahasiswa,

        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Mahasiswa Berhasil Diubah',
                'url'   =>  url('/mahasiswa/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Mahasiswa Gagal Diubah'],422);
        }
    }

    public function delete(Mahasiswa $mahasiswa){
        $delete = Mahasiswa::where('npm',$mahasiswa->npm)->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Mahasiswa Berhasil dihapus',
                'url'   =>  url('/mahasiswa/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Mahasiswa Gagal dihapus'],422);
        }
    }
}
