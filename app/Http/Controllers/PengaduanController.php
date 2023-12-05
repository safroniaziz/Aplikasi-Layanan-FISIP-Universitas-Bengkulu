<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index(){
        $pengaduans = Pengaduan::orderBy('created_at','desc')->get();
        return view('backend/pengaduan.index',[
            'pengaduans' =>  $pengaduans,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'nip'         => 'required|unique:pengaduans|numeric',
            'nama_pegawai'  => 'required',
            'jabatan'  => 'required',
            'no_hp'  => 'required|numeric',
        ];

        $text = [
            'nip.required'      => 'NIP harus diisi.',
            'nip.unique'        => 'NIP sudah digunakan, harap pilih NIP lain.',
            'nama_pegawai.required' => 'Nama pegawai harus diisi.',
            'jabatan.required' => 'Jabatan pegawai harus diisi.',
            'no_hp.required' => 'Nomor WhatsApp harus diisi.',
            'no_hp.numeric' => 'Nomor WhatsApp harus berupa angka.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = Pengaduan::create([
            'nip'                 =>  $request->nip,
            'nama_pegawai'          =>  $request->nama_pegawai,
            'jabatan'          =>  $request->jabatan,
            'no_hp'             =>  $request->no_hp,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Pegawai Berhasil Ditambahkan',
                'url'   =>  route('pegawai'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Pegawai Gagal Ditambahkan'],422);
        }
    }

    public function edit(Pegawai $pegawai){
        return $pegawai;
    }

    public function update(Request $request){
        $rules = [
            'nip'         => 'required|numeric',
            'nama_pegawai'  => 'required',
            'jabatan'  => 'required',
            'no_hp'  => 'required|numeric',
        ];

        $text = [
            'nip.required'      => 'NIP harus diisi.',
            'nip.unique'        => 'NIP sudah digunakan, harap pilih NIP lain.',
            'nama_pegawai.required' => 'Nama pegawai harus diisi.',
            'jabatan.required' => 'Jabatan pegawai harus diisi.',
            'no_hp.required' => 'Nomor WhatsApp harus diisi.',
            'no_hp.numeric' => 'Nomor WhatsApp harus berupa angka.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = Pengaduan::where('nip',$request->nip)->update([
            'nama_pegawai'      =>  $request->nama_pegawai,
            'jabatan'      =>  $request->jabatan,
            'no_hp'             =>  $request->no_hp,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Pegawai Berhasil Diubah',
                'url'   =>  route('pegawai'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Pegawai Gagal Diubah'],422);
        }
    }

    public function delete(Request $request, Pegawai $pegawai){
        $delete = Pengaduan::where('nip',$pegawai->nip)->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Pegawai Berhasil dihapus',
                'url'   =>  route('pegawai'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Pegawai Gagal dihapus'],422);
        }
    }

    public function respon($id){
        return Pengaduan::where('id',$id)->first();
    }

    public function responPost(Request $request){
        $pengaduan = Pengaduan::where('id',$request->id_respon)->first();
        $respon = Pengaduan::where('id',$request->id_respon)->update([
            'respon'    =>  $request->respon,
        ]);

        if ($respon) {
            $target = $pengaduan->user->no_hp;
            $token = "VUPG2eveV7sG+9ZzEIMz";
            $messageController = new WaController();
            $message = "Halo '".$pengaduan->user->name."', Respon pengaduan anda : ".$request->respon;
            $response = $messageController->sendWa($token, $target, $message);

            return response()->json([
                'text'  =>  'Yeay, Pengaduan Berhasil direspon',
                'url'   =>  route('pengaduan'),
            ]);
        }
    }
}
