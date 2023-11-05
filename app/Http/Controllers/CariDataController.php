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
        $token = "VUPG2eveV7sG+9ZzEIMz";
        $target = "081367948313";
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'target' => $target,
            'message' => 'test pesan menggunakan php 2',
        ),
        CURLOPT_HTTPHEADER => array(
            "Authorization: $token"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response);
        return $data->detail;
    }
}
