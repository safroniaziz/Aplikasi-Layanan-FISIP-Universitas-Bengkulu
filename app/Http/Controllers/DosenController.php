<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProgramStudi;

class DosenController extends Controller
{
    public function index(){
        $prodis = ProgramStudi::withCount('dosens')->get();
        return view('backend/dosens.index',[
            'prodis' =>  $prodis,
        ]);
    }

    public function detail(ProgramStudi $prodi){
        $dosens = Dosen::where('prodi_kode',$prodi->kode)->orderBy('created_at','desc')->get();
        return view('backend.dosens.detail',[
            'prodi' =>  $prodi,
            'dosens' =>  $dosens,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'nip'         => 'required|unique:dosens|numeric',
            'nama_dosen'  => 'required',
            'no_hp'  => 'required|numeric',
        ];

        $text = [
            'nip.required'      => 'NIP harus diisi.',
            'nip.unique'        => 'NIP sudah digunakan, harap pilih NIP lain.',
            'nama_dosen.required' => 'Nama dosen harus diisi.',
            'no_hp.required' => 'Nomor WhatsApp harus diisi.',
            'no_hp.numeric' => 'Nomor WhatsApp harus berupa angka.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = Dosen::create([
            'nip'                 =>  $request->nip,
            'prodi_kode'          =>  $request->prodiKode,
            'nama_dosen'          =>  $request->nama_dosen,
            'no_hp'             =>  $request->no_hp,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Dosen Berhasil Ditambahkan',
                'url'   =>  route('dosen.detail',[$request->prodiKode]),
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
            'nama_dosen'  => 'required',
            'no_hp'  => 'required|numeric',
        ];

        $text = [
            'nama_dosen.required' => 'Nama dosen harus diisi.',
            'no_hp.required' => 'Nomor WhatsApp harus diisi.',
            'no_hp.numeric' => 'Nomor WhatsApp harus berupa angka.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = Dosen::where('nip',$request->nip)->update([
            'nama_dosen'      =>  $request->nama_dosen,
            'no_hp'             =>  $request->no_hp,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Dosen Berhasil Diubah',
                'url'   =>  route('dosen.detail',[$request->prodiKode]),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Dosen Gagal Diubah'],422);
        }
    }

    public function delete(Request $request, Dosen $dosen){
        $delete = Dosen::where('nip',$dosen->nip)->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Dosen Berhasil dihapus',
                'url'   =>  route('dosen.detail',[$request->prodiKode]),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Dosen Gagal dihapus'],422);
        }
    }
}
