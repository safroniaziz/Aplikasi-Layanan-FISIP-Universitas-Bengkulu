<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function index(){
        if (!Gate::allows('pegawai')) {
            abort(403);
        }
        $pegawais = Pegawai::orderBy('created_at','desc')->get();
        return view('backend/pegawai.index',[
            'pegawais' =>  $pegawais,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'nip'         => 'required|unique:pegawais|numeric',
            'nama_pegawai'  => 'required',
            'jabatan'  => 'required',
            'no_hp'  => 'required|numeric',
        ];

        $text = [
            'nip.required'      => 'NIP harus diisi.',
            'nip.unique'        => 'NIP sudah digunakan, harap pilih NIP lain.',
            'nama_pegawai.required' => 'Nama pegawai harus diisi.',
            'jabatan.required' => 'Jabatan pegawai harus diisi.',
            'no_hp.required' => 'Nomor WhatsApp harus diisi.',
            'no_hp.numeric' => 'Nomor WhatsApp harus berupa angka.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = Pegawai::create([
            'nip'                 =>  $request->nip,
            'nama_pegawai'          =>  $request->nama_pegawai,
            'jabatan'          =>  $request->jabatan,
            'no_hp'             =>  $request->no_hp,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Pegawai Berhasil Ditambahkan',
                'url'   =>  route('pegawai'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Pegawai Gagal Ditambahkan'],422);
        }
    }

    public function edit(Pegawai $pegawai){
        return $pegawai;
    }

    public function update(Request $request){
        $rules = [
            'nip'         => 'required|numeric',
            'nama_pegawai'  => 'required',
            'jabatan'  => 'required',
            'no_hp'  => 'required|numeric',
        ];

        $text = [
            'nip.required'      => 'NIP harus diisi.',
            'nip.unique'        => 'NIP sudah digunakan, harap pilih NIP lain.',
            'nama_pegawai.required' => 'Nama pegawai harus diisi.',
            'jabatan.required' => 'Jabatan pegawai harus diisi.',
            'no_hp.required' => 'Nomor WhatsApp harus diisi.',
            'no_hp.numeric' => 'Nomor WhatsApp harus berupa angka.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = Pegawai::where('nip',$request->nip)->update([
            'nama_pegawai'      =>  $request->nama_pegawai,
            'jabatan'      =>  $request->jabatan,
            'no_hp'             =>  $request->no_hp,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Pegawai Berhasil Diubah',
                'url'   =>  route('pegawai'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Pegawai Gagal Diubah'],422);
        }
    }

    public function delete(Request $request, Pegawai $pegawai){
        $delete = Pegawai::where('nip',$pegawai->nip)->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Pegawai Berhasil dihapus',
                'url'   =>  route('pegawai'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Pegawai Gagal dihapus'],422);
        }
    }
}
