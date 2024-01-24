<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use App\Models\RuanganKelas;
use Illuminate\Http\Request;
use App\Models\JadwalPerkuliahan;
use Illuminate\Support\Facades\Gate;
use App\Models\JadwalPerkuliahanStatus;
use Illuminate\Support\Facades\Validator;
use App\Models\PengalihanPembatalanJadwal;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class JadwalPerkuliahanController extends Controller
{
    public function index(Request $request){
        if (!Gate::allows('jadwalPerkuliahan')) {
            abort(403);
        }
        $mataKuliahs = MataKuliah::all();
        $ruanganKelas = RuanganKelas::all();
        $hariIni = Carbon::now()->isoFormat('dddd');
        $nama = $request->query('nama');
        if (!empty($nama)) {
            $jadwalPerkuliahans = JadwalPerkuliahan::with(['mataKuliah','ruanganKelas'])
                                                    ->whereHas('mataKuliah',function($query) use ($nama){
                                                        $query->where('nama_mata_kuliah', 'like', '%' . $nama . '%');
                                                    })
                                                    ->where('hari',$hariIni)
                                                    ->paginate(10);
        }else{
            $jadwalPerkuliahans = JadwalPerkuliahan::with(['mataKuliah','ruanganKelas'])->where('hari',$hariIni)->paginate(10);
        }
        $prodis = ProgramStudi::all();
        return view('backend/jadwalPerkuliahans.index',[
            'jadwalPerkuliahans'  =>  $jadwalPerkuliahans,
            'mataKuliahs'  =>  $mataKuliahs,
            'ruanganKelas'  =>  $ruanganKelas,
            'prodis'  =>  $prodis,
            'hariIni'  =>  $hariIni,
            'nama'  =>  $nama,
        ]);
    }

    public function semuaJadwal(){
        $mataKuliahs = MataKuliah::all();
        $ruanganKelas = RuanganKelas::all();
        $hariIni = Carbon::now()->isoFormat('dddd');
        $jadwalPerkuliahans = JadwalPerkuliahan::with(['mataKuliah','ruanganKelas'])->get();
        $prodis = ProgramStudi::all();
        return view('backend/jadwalPerkuliahans.semuaJadwal',[
            'jadwalPerkuliahans'  =>  $jadwalPerkuliahans,
            'mataKuliahs'  =>  $mataKuliahs,
            'ruanganKelas'  =>  $ruanganKelas,
            'prodis'  =>  $prodis,
            'hariIni'  =>  $hariIni,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'mata_kuliah_id'   => 'required',
            'ruangan_kelas_id' => 'required',
            'hari'             => 'required',
            'waktu_mulai'      => 'required|numeric',
            'waktu_selesai'    => 'required|numeric',
        ];

        $text = [
            'mata_kuliah_id.required'   => 'Mata Kuliah Id harus diisi.',
            'ruangan_kelas_id.required' => 'Ruangan Kelas Id harus diisi.',
            'hari.required'             => 'Hari harus diisi.',
            'waktu_mulai.required'      => 'Waktu Mulai harus diisi.',
            'waktu_mulai.numeric'       => 'Waktu Mulai harus berupa angka.',
            'waktu_selesai.required'    => 'Waktu Selesai harus diisi.',
            'waktu_selesai.numeric'     => 'Waktu Selesai harus berupa angka.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create =JadwalPerkuliahan::create([
            'mata_kuliah_id'    =>  $request->mata_kuliah_id,
            'ruangan_kelas_id'  =>  $request->ruangan_kelas_id,
            'hari'              =>  $request->hari,
            'waktu_mulai'       =>  $request->waktu_mulai,
            'waktu_selesai'     =>  $request->waktu_selesai,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Jadwal Perkuliahan Berhasil Ditambahkan',
                'url'   =>  url('/jadwal_perkuliahan/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Jadwal Perkuliahan Gagal Ditambahkan'],422);
        }
    }

    public function edit(JadwalPerkuliahan $jadwalPerkuliahan){
        return $jadwalPerkuliahan;
    }

    public function update(Request $request){
        $rules = [
            'mata_kuliah_id'   => 'required',
            'ruangan_kelas_id' => 'required',
            'hari'             => 'required',
            'waktu_mulai'      => 'required|numeric',
            'waktu_selesai'    => 'required|numeric',
        ];

        $text = [
            'mata_kuliah_id.required'   => 'Mata Kuliah Id harus diisi.',
            'ruangan_kelas_id.required' => 'Ruangan Kelas Id harus diisi.',
            'hari.required'             => 'Hari harus diisi.',
            'waktu_mulai.required'      => 'Waktu Mulai harus diisi.',
            'waktu_mulai.numeric'       => 'Waktu Mulai harus berupa angka.',
            'waktu_selesai.required'    => 'Waktu Selesai harus diisi.',
            'waktu_selesai.numeric'     => 'Waktu Selesai harus berupa angka.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = JadwalPerkuliahan::where('id',$request->id)->update([
            'mata_kuliah_id'    =>  $request->mata_kuliah_id,
            'ruangan_kelas_id'  =>  $request->ruangan_kelas_id,
            'hari'              =>  $request->hari,
            'waktu_mulai'       =>  $request->waktu_mulai,
            'waktu_selesai'     =>  $request->waktu_selesai,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Jadwal Perkuliahan Berhasil Diubah',
                'url'   =>  url('/jadwal_perkuliahan/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Jadwal Perkuliahan Gagal Diubah'],422);
        }
    }

    public function delete(JadwalPerkuliahan $jadwalPerkuliahan){
        $delete = $jadwalPerkuliahan->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Jadwal Perkuliahan Berhasil dihapus',
                'url'   =>  url('/jadwal_perkuliahan/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Jadwal Perkuliahan Gagal dihapus'],422);
        }
    }

    public function batalkan(JadwalPerkuliahan $jadwalPerkuliahan){
        $sekarang = Carbon::now();
        JadwalPerkuliahanStatus::create([
            'jadwal_perkuliahan_id' =>  $jadwalPerkuliahan->id,
            'is_cancel'             =>  1,
            'tanggal'               =>  $sekarang->format('Y-m-d'),
        ]);

        return response()->json([
            'text'  =>  'Berhasil, jadwal sudah dibatalkan',
            'url'   =>  route('jadwalPerkuliahan'),
        ]);
    }

    public function alihkan(Request $request){
        $rules = [
            'dialihkan_ke'   => 'required',
            'dialihkan_dari' => 'required',
            'waktu_mulai'      => 'required',
            'waktu_selesai'    => 'required',
        ];

        $text = [
            'dialihkan_dari.required'      => 'Tanggal Dialihkan harus diisi.',
            'dialihkan_ke.required'      => 'Dialihkan Ke harus diisi.',
            'waktu_mulai.required'      => 'Waktu Mulai harus diisi.',
            'waktu_selesai.required'    => 'Waktu Selesai harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        PengalihanPembatalanJadwal::create([
            'jadwal_id' =>  $request->id,
            'dialihkan_dari'    =>  $request->dialihkan_dari,
            'dialihkan_ke'  =>  $request->dialihkan_ke,
            'waktu_mulai'   =>  $request->waktu_mulai,
            'waktu_selesai' =>  $request->waktu_selesai,
        ]);

        return response()->json([
            'text'  =>  'Berhasil, jadwal sudah dialihkan',
            'url'   =>  route('jadwalPerkuliahan'),
        ]);
    }

    public function kehadiran($id){
        $jadwalPerkuliahan = JadwalPerkuliahan::with(['mataKuliah','ruanganKelas'])->where('id',$id)->first();
        return view('backend.jadwalPerkuliahans.kehadiran',[
            'jadwalPerkuliahan' =>  $jadwalPerkuliahan,
        ]);
    }

    public function scanQRCode($id)
    {
        // Temukan data berdasarkan ID
        $data = JadwalPerkuliahan::find($id);
        dd($data);
        if (!$data) {
            abort(404);
        }

        // Lakukan pembaruan data sesuai kebutuhan
        $data->update([
            'status' => 'Sudah Dipindai', // Ganti dengan kolom yang ingin Anda perbarui
        ]);

        // Redirect atau kembalikan respons sesuai kebutuhan
        return redirect()->route('jadwalPerkuliahan')->with('success', 'Data berhasil diperbarui setelah pemindaian QR code.');
    }
}
