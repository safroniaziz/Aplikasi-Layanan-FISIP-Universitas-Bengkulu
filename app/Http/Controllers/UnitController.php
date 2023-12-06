<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    public function index(){
        $units = Unit::all();
        return view('backend/units.index',[
            'units'   =>  $units,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'nama_unit' => 'required',
        ];
        
        $text = [
            'nama_unit.required'  => 'nama unit harus diisi.',
        ];
        
        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = Unit::create([
            'nama_unit'       =>  $request->nama_unit,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, unit berhasil ditambahkan',
                'url'   =>  route('unit'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, unit Gagal Ditambahkan'],422);
        }
    }

    public function edit(Unit $unit){
        return $unit;
    }

    public function update(Request $request){
        $rules = [
            'nama_unit' => 'required',
        ];
        
        $text = [
            'nama_unit.required'  => 'nama unit harus diisi.',
        ];
        
        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = Unit::where('id',$request->id)->update([
            'nama_unit'       =>  $request->nama_unit,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, nama unit berhasil diubah',
                'url'   =>  route('unit'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, unit Gagal Diubah'],422);
        }
    }

    public function delete(Unit $unit){
        $delete = $unit->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, unit Berhasil dihapus',
                'url'   =>  url('/jenis_surats/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, unit Gagal dihapus'],422);
        }
    }
}
