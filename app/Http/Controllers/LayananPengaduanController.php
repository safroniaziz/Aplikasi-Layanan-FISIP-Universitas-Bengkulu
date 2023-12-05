<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananPengaduanController extends Controller
{
    public function index(){
        return view('frontend.pengaduan');
    }
}
