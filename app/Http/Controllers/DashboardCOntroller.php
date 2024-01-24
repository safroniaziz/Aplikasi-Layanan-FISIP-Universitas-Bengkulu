<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use App\Models\Dosen;
use App\Models\JadwalPerkuliahan;
use App\Models\JenisSurat;
use App\Models\MataKuliah;
use App\Models\Pegawai;
use App\Models\ProgramStudi;
use App\Models\RuanganKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index(){
        if (!Gate::allows('dashboard')) {
            abort(403);
        }
        $matkuls = MataKuliah::count();
        $dosens = Dosen::count();
        $jadwals = JadwalPerkuliahan::count();
        $jenisSurats = JenisSurat::count();
        $prodis = ProgramStudi::count();
        $pegawais = Pegawai::count();
        $ruangans = RuanganKelas::count();
        $bukuTamus = BukuTamu::count();
        return view('backend.dashboard.index',compact('matkuls','dosens','jadwals','jenisSurats','prodis','pegawais','ruangans','bukuTamus'));
    }
}
