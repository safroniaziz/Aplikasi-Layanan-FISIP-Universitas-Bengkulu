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

    public function wa(){
        $messageController = new WaController();
        $token = "VUPG2eveV7sG+9ZzEIMz";
        $target = "081367948313";
        $message = 'test pesan menggunakan php 2';

        // Panggil fungsi sendWa dari MessageController
        $response = $messageController->sendWa($token, $target, $message);
        return $response;
    }
}
