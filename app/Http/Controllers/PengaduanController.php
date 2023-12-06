<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
    public function index(){
        $pengaduans = Pengaduan::orderBy('created_at','desc')->get();
        return view('backend/pengaduan.index',[
            'pengaduans' =>  $pengaduans,
        ]);
    }

    public function download(Pengaduan $pengaduan){
        if ($pengaduan) {
            $filePath = storage_path("app/public/{$pengaduan->bukti_pendukung}");
            if (Storage::disk('public')->exists("{$pengaduan->bukti_pendukung}")) {
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

    public function respon($id){
        return Pengaduan::where('id',$id)->first();
    }

    public function responPost(Request $request){
        $rules = [
            'respon' => 'required',
        ];
        
        $text = [
            'respon.required'  => 'tanggapan harus diisi.',
        ];
        
        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

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
