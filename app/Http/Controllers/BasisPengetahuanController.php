<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\BasisPengetahuan;
use Illuminate\Support\Facades\Validator;

class BasisPengetahuanController extends Controller
{
    public function index(){
        $basisPengetahuans = BasisPengetahuan::all();
        return view('backend/basisPengetahuans.index',[
            'basisPengetahuans'  =>  $basisPengetahuans,
        ]);
    }

    public function create(){
        return view('backend.basisPengetahuans.create');
    }

    public function store(Request $request){
        $rules = [
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ];

        $text = [
            'pertanyaan.required' => 'Pertanyaan harus diisi.',
            'jawaban.required' => 'Jawaban harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create =BasisPengetahuan::create([
            'pertanyaan'    =>  $request->pertanyaan,
            'jawaban'    =>  $request->jawaban,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Basis Pengetahuan Berhasil Ditambahkan',
                'url'   =>  url('/basis_pengetahuan/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Basis Pengetahuan Gagal Ditambahkan'],422);
        }
    }

    public function edit(BasisPengetahuan $basisPengetahuan){
        return $basisPengetahuan;
    }

    public function update(Request $request){
        $rules = [
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ];

        $text = [
            'pertanyaan.required' => 'Pertanyaan harus diisi.',
            'jawaban.required' => 'Jawaban harus diisi.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = BasisPengetahuan::where('id',$request->id)->update([
            'pertanyaan'    =>  $request->pertanyaan,
            'jawaban'    =>  $request->jawaban,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Basis Pengetahuan Berhasil Diubah',
                'url'   =>  url('/basis_pengetahuan/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Basis Pengetahuan Gagal Diubah'],422);
        }
    }

    public function delete(BasisPengetahuan $basisPengetahuan){
        $delete = BasisPengetahuan::where('id',$basisPengetahuan->id)->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Basis Pengetahuan Berhasil dihapus',
                'url'   =>  url('/basis_pengetahuan/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Basis Pengetahuan Gagal dihapus'],422);
        }
    }

    public function sendTawktoMessage(Request $request)
    {
        $apiKey = 'aaa8fd5463df210c14b7bc0b5cc7b47c4cef6dec'; // Gantilah dengan API Key Anda
        $conversationId = $request->input('conversation_id');
        $message = $request->input('message');

        $url = "https://api.tawk.to/v1/conversations/{$conversationId}/messages";

        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ],
            'json' => [
                'message' => $message,
            ],
        ]);

        return response()->json(['message' => 'Pesan terkirim']);
    }
}
