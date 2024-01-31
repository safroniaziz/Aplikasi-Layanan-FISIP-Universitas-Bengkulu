<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;
use App\Models\RequirementSurat;

class PermohonanSuratController extends Controller
{
    public function index(){
        $jenisSurats = JenisSurat::all();
        $requirementSurat = RequirementSurat::all();
        return view('frontend.permohonan_surat',[
            'jenisSurats'   => $jenisSurats,
            'requirementSurat'   => $requirementSurat,
        ]);
    }

    public function cetak(){
        // Dapatkan path PDF yang telah disimpan di direktori public
        $pdfPath = public_path('pdf/surat_cuti.pdf');

        // Tampilkan PDF
        return response()->file($pdfPath);
    }
}
