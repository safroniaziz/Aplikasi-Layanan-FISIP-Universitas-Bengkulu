<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermohonanSurat;
use App\Models\KelengkapanSurat;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PermohonanSuratMasukController extends Controller
{
    public function index(){
        if (!Gate::allows('permohonan')) {
            abort(403);
        }
        $permohonanSurats = PermohonanSurat::with(['jenisSurat','user','kelengkapanSurats'])->orderBy('created_at','desc')->get();
        return view('backend/permohonanSuratMasuk.index',[
            'permohonanSurats'   =>  $permohonanSurats,
        ]);
    }

    public function verifikasi(PermohonanSurat $permohonan){
        return $permohonan;
    }

    public function verifikasiPost(Request $request){
        $rules = [
            'status' => 'required',
            'keterangan_status' => 'required',
        ];

        $text = [
            'status.required'  => 'Status Permohonan harus diisi.',
            'keterangan_status.required'  => 'Keterangan Permohonan harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }
        $permohonanSurat = PermohonanSurat::with(['user'])->where('id',$request->id_verifikasi)->first();
        $create = PermohonanSurat::where('id',$request->id_verifikasi)->update([
            'status'       =>  $request->status,
            'keterangan_status'        =>  $request->keterangan_status,
        ]);

        if ($request->status == "selesai") {
            $pesan = "Halo '".$permohonanSurat->user->name."', Permohonan Surat anda sudah selesai silahkan ambil di bagian akademik fakultas ";
        }elseif ($request->status == "ditolak") {
            $pesan = "Halo '".$permohonanSurat->user->name."', Mohon maaf permohonan Surat anda ditolak dengan keterangan : ".$request->keterangan_status;
        }else{
            $pesan = "Halo '".$permohonanSurat->user->name."', Permohonan Surat anda sedang diproses dengan keterangan : ".$request->keterangan_status;
        }

        if ($create) {
            $target = $permohonanSurat->user->no_hp;
            $token = "VUPG2eveV7sG+9ZzEIMz";
            $messageController = new WaController();
            $message = $pesan;
            $response = $messageController->sendWa($token, $target, $message);
            return response()->json([
                'text'  =>  'Yeay, Permohonan Surat Berhasil Diubah',
                'url'   =>  route('permohonan'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Permohonan Surat Gagal Diubah'],422);
        }
    }

    public function download(KelengkapanSurat $kelengkapan){
        if ($kelengkapan) {
            $filePath = storage_path("app/public/{$kelengkapan->file_path}");
            if (Storage::disk('public')->exists("{$kelengkapan->file_path}")) {
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
