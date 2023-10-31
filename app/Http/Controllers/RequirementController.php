<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;
use App\Models\RequirementSurat;
use Illuminate\Support\Facades\Validator;

class RequirementController extends Controller
{
    public function index(JenisSurat $jenisSurat){
        $kelengkapans = RequirementSurat::where('jenis_surat_id',$jenisSurat->id)->get();
        return view('backend.requirements.index', [
            'jenisSurat'    =>  $jenisSurat,
            'kelengkapans'    =>  $kelengkapans,
        ]);
    }

    public function store(Request $request, JenisSurat $jenisSurat){
        $rules = [
            'requirement' => 'required',
        ];
        
        $text = [
            'requirement.required'  => 'Kelengkapan Surat harus diisi.',
        ];
        
        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = RequirementSurat::create([
            'jenis_surat_id'    =>  $jenisSurat->id,
            'requirement'       =>  $request->requirement,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Kelengkapan Surat Berhasil Ditambahkan',
                'url'   =>  route('jenisSurat.kelengkapan',[$jenisSurat->id]),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Kelengkapan Surat Gagal Ditambahkan'],422);
        }
    }

    public function edit(RequirementSurat $kelengkapan){
        return $kelengkapan;
    }

    public function update(Request $request, JenisSurat $jenisSurat){
        $rules = [
            'requirement' => 'required',
        ];
        
        $text = [
            'requirement.required'  => 'Kelengkapan Surat harus diisi.',
        ];
        
        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = RequirementSurat::where('id',$request->id)->update([
            'requirement'        =>  $request->requirement,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Kelengkapan Surat Berhasil Diubah',
                'url'   =>  route('jenisSurat.kelengkapan',[$jenisSurat->id]),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Kelengkapan Surat Gagal Diubah'],422);
        }
    }

    public function delete(JenisSurat $jenisSurat, RequirementSurat $kelengkapan){
        $delete = $kelengkapan->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Kelengkapan Berhasil dihapus',
                'url'   =>  route('jenisSurat.kelengkapan',[$jenisSurat->id]),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Kelengkapan Gagal dihapus'],422);
        }
    }
}
