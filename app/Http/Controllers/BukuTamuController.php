<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuTamuController extends Controller
{
    public function index(){
        return view('frontend.buku_tamu');
    }

    public function store(Request $request){
        return $request->all();
    }
}