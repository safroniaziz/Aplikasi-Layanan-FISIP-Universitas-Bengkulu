<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManajemenBukuTamuController extends Controller
{
    public function index(Request $request){
        $nama = $request->query('nama');
        if (!empty($nama)) {
            $bukuTamus = BukuTamu::where('nama_tamu', 'LIKE', '%' . $nama . '%')->orderBy('created_at','desc')->paginate(10);
        }else{
            $bukuTamus = BukuTamu::orderBy('created_at','desc')->paginate(10);
        }
        return view('backend.manajemenBukuTamu.index',[
            'bukuTamus' =>  $bukuTamus,
            'nama'      =>  $nama,
        ]);
    }

    public function download(BukuTamu $bukuTamu){
        if ($bukuTamu) {
            $filePath = storage_path("app/public/{$bukuTamu->foto}");
            if (Storage::disk('public')->exists("{$bukuTamu->foto}")) {
                return response()->download($filePath);
            } else {
                // Handle file not found in storage
                abort(404);
            }
        } else {
            // Handle file record not found in the database
            abort(404);
        }
    }
}
