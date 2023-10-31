<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisSuratController extends Controller
{
    public function index(){
        $jenisSurats = JenisSurat::withCount(['requirements'])->orderBy('created_at','desc')->get();
        return view('backend/jenisSurat.index',[
            'jenisSurats'   =>  $jenisSurats,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'jenis_surat' => 'required|unique:jenis_surats,jenis_surat',
        ];
        
        $text = [
            'jenis_surat.required'  => 'Jenis Surat harus diisi.',
            'jenis_surat.unique'    => 'Jenis Surat sudah ada.',
        ];
        
        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = JenisSurat::create([
            'jenis_surat'       =>  $request->jenis_surat,
            'keterangan'        =>  $request->keterangan,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Jenis Surat Berhasil Ditambahkan',
                'url'   =>  route('jenisSurat'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Jenis Surat Gagal Ditambahkan'],422);
        }
    }

    public function edit(JenisSurat $jenisSurat){
        return $jenisSurat;
    }

    public function update(Request $request){
        $rules = [
            'jenis_surat' => 'required',
        ];
        
        $text = [
            'jenis_surat.required'  => 'Jenis Surat harus diisi.',
        ];
        
        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = JenisSurat::where('id',$request->id)->update([
            'jenis_surat'       =>  $request->jenis_surat,
            'keterangan'        =>  $request->keterangan,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Jenis Surat Berhasil Diubah',
                'url'   =>  route('jenisSurat'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Jenis Surat Gagal Diubah'],422);
        }
    }

    public function delete(JenisSurat $jenisSurat){
        $delete = $jenisSurat->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Jenis Surat Berhasil dihapus',
                'url'   =>  url('/jenis_surats/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Jenis Surat Gagal dihapus'],422);
        }
    }
}
