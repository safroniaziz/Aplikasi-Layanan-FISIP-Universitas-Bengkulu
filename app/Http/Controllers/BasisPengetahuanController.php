<?php

namespace App\Http\Controllers;

use App\Models\BasisPengetahuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BasisPengetahuanController extends Controller
{
    public function index(){
        $basisPengetahuans = BasisPengetahuan::all();
        return view('backend/basisPengetahuans.index',[
            'basisPengetahuans'  =>  $basisPengetahuans,
        ]);
    }

    public function create(){
        return view('backend.basisPengetahuans.create');
    }

    public function store(Request $request){
        $rules = [
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ];

        $text = [
            'pertanyaan.required' => 'Pertanyaan harus diisi.',
            'jawaban.required' => 'Jawaban harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create =BasisPengetahuan::create([
            'pertanyaan'    =>  $request->pertanyaan,
            'jawaban'    =>  $request->jawaban,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Basis Pengetahuan Berhasil Ditambahkan',
                'url'   =>  url('/basis_pengetahuan/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Basis Pengetahuan Gagal Ditambahkan'],422);
        }
    }

    public function edit(BasisPengetahuan $basisPengetahuan){
        return $basisPengetahuan;
    }

    public function update(Request $request){
        $rules = [
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ];

        $text = [
            'pertanyaan.required' => 'Pertanyaan harus diisi.',
            'jawaban.required' => 'Jawaban harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = BasisPengetahuan::where('id',$request->id)->update([
            'pertanyaan'    =>  $request->pertanyaan,
            'jawaban'    =>  $request->jawaban,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Basis Pengetahuan Berhasil Diubah',
                'url'   =>  url('/basis_pengetahuan/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Basis Pengetahuan Gagal Diubah'],422);
        }
    }

    public function delete(BasisPengetahuan $basisPengetahuan){
        $delete = BasisPengetahuan::where('id',$basisPengetahuan->id)->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Basis Pengetahuan Berhasil dihapus',
                'url'   =>  url('/basis_pengetahuan/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Basis Pengetahuan Gagal dihapus'],422);
        }
    }
}
