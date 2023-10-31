<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermohonanSuratController extends Controller
{
    public function index(){
        return view('frontend.permohonan_surat');
    }
}
