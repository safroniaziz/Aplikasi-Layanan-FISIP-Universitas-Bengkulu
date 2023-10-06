<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class CariDataController extends Controller
{
    public function cariMataKuliahByProdi(Request $request){
        $mataKuliahs = MataKuliah::where('prodi_kode',$request->prodiKode)->get();
        return $mataKuliahs;
    }
}
