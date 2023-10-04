<?php

namespace App\Http\Controllers;

use App\Models\AlatPoadcast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AlatPoadcastController extends Controller
{
    public function index(){
        $alatPoadcasts = AlatPoadcast::all();
        return view('backend/alatPoadcasts.index',[
            'alatPoadcasts'  =>  $alatPoadcasts,
        ]);
    }

    public function create(){
        return view('backend.alatPoadcasts.create');
    }

    public function store(Request $request){
        $rules = [
            'nama_alat'         => 'required',
            'deskripsi'         => 'required',
            'jumlah_alat'       => 'required|numeric',
            'foto'              => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $text = [
            'nama_alat.required'   => 'Nama Alat harus diisi.',
            'deskripsi.required'   => 'Deskripsi harus diisi.',
            'jumlah_alat.required' => 'Jumlah Alat harus diisi.',
            'jumlah_alat.numeric'  => 'Jumlah Alat harus berupa angka.',
            'foto.required'        => 'Foto harus diunggah.',
            'foto.image'           => 'File harus berupa gambar.',
            'foto.mimes'           => 'Format gambar harus jpeg, png, atau jpg.',
            'foto.max'             => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $model = $request->all();
        $model['foto'] = null;

        if ($request->hasFile('foto')){
            $model['foto'] = Str::slug($model['nama_alat'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/foto_alat/'), $model['foto']);
        }

        $create = AlatPoadcast::create([
            'nama_alat'       =>  $request->nama_alat,
            'deskripsi'       =>  $request->deskripsi,
            'jumlah_alat'     =>  $request->jumlah_alat,
            'foto'            =>  $model['foto'],
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Alat Poadcast Berhasil Ditambahkan',
                'url'   =>  url('/alat_poadcast/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Alat Poadcast Gagal Ditambahkan'],422);
        }
    }

    public function edit(AlatPoadcast $alatPoadcast){
        return view('backend.alatPoadcasts.edit',[
            'alatPoadcast'   =>  $alatPoadcast,
        ]);
    }

    public function update(AlatPoadcast $alatPoadcast, Request $request){
        $rules = [
            'nama_alat'         => 'required',
            'deskripsi'         => 'required',
            'jumlah_alat'       => 'required|numeric',
            'foto'              => 'image|mimes:jpeg,png,jpg|max:2048',
        ];

        $text = [
            'nama_alat.required'   => 'Nama Alat harus diisi.',
            'deskripsi.required'   => 'Deskripsi harus diisi.',
            'jumlah_alat.required' => 'Jumlah Alat harus diisi.',
            'jumlah_alat.numeric'  => 'Jumlah Alat harus berupa angka.',
            'foto.required'        => 'Foto harus diunggah.',
            'foto.image'           => 'File harus berupa gambar.',
            'foto.mimes'           => 'Format gambar harus jpeg, png, atau jpg.',
            'foto.max'             => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $model = $request->all();
        $model['foto'] = $alatPoadcast->foto;
        $filePath = public_path('upload/foto_alat/' . $alatPoadcast->foto);
        if ($request->hasFile('foto')){
            if (!$alatPoadcast->foto == NULL){
                unlink($filePath);
            }
            $model['foto'] = Str::slug($model['nama_alat'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/foto_alat/'), $model['foto']);
        }

        $update = $alatPoadcast->update([
            'nama_alat'  =>  $request->nama_alat,
            'deskripsi'     =>  $request->deskripsi,
            'jumlah_alat'     =>  $request->jumlah_alat,
            'foto'          =>  $model['foto'],
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Alat Poadcast Berhasil Diubah',
                'url'   =>  url('/alat_poadcast/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Alat Poadcast Gagal Diubah'],422);
        }
    }

    public function delete(AlatPoadcast $alatPoadcast){
        $delete = $alatPoadcast->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Alat Poadcast Berhasil dihapus',
                'url'   =>  url('/alat_poadcast/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Alat Poadcast Gagal dihapus'],422);
        }
    }
}

