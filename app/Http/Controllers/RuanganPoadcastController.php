<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RuanganPoadcast;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RuanganPoadcastController extends Controller
{
    public function index(){
        if (!Gate::allows('ruanganPoadcast')) {
            abort(403);
        }
        $ruanganPoadcasts = RuanganPoadcast::all();
        return view('backend/ruanganPoadcasts.index',[
            'ruanganPoadcasts'  =>  $ruanganPoadcasts,
        ]);
    }

    public function create(){
        return view('backend.ruanganPoadcasts.create');
    }

    public function store(Request $request){
        $rules = [
            'nama_ruangan'      => 'required',
            'deskripsi'         => 'required',
            'kapasitas'         => 'required|numeric',
            'lokasi'            => 'required',
            'harga_sewa'        => 'required|numeric',
            'foto'              => 'required|image|mimes:jpeg,png,jpg|max:2048', // Ganti ini sesuai dengan kebutuhan
        ];

        $text = [
            'nama_ruangan.required'     => 'Nama Ruangan harus diisi',
            'deskripsi.required'        => 'Deskripsi harus diisi',
            'kapasitas.required'        => 'Kapasitas harus diisi',
            'kapasitas.numeric'         => 'Kapasitas harus berupa angka',
            'lokasi.required'           => 'Lokasi harus diisi',
            'harga_sewa.required'       => 'Harga Sewa harus diisi',
            'harga_sewa.numeric'        => 'Harga Sewa harus berupa angka',
            'foto.required'             => 'Foto harus diunggah',
            'foto.image'                => 'Foto harus berupa gambar',
            'foto.mimes'                => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif',
            'foto.max'                  => 'Ukuran maksimum gambar adalah 2MB',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $model = $request->all();
        $model['foto'] = null;

        if ($request->hasFile('foto')){
            $model['foto'] = Str::slug($model['nama_ruangan'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/foto_ruangan/'), $model['foto']);
        }

        $create = RuanganPoadcast::create([
            'nama_ruangan'  =>  $request->nama_ruangan,
            'deskripsi'     =>  $request->deskripsi,
            'kapasitas'     =>  $request->kapasitas,
            'lokasi'        =>  $request->lokasi,
            'harga_sewa'    =>  $request->harga_sewa,
            'foto'          =>  $model['foto'],
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Ruangan Poadcast Berhasil Ditambahkan',
                'url'   =>  url('/ruangan_poadcast/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Ruangan Poadcast Gagal Ditambahkan'],422);
        }
    }

    public function edit(RuanganPoadcast $ruanganPoadcast){
        return view('backend.ruanganPoadcasts.edit',[
            'ruanganPoadcast'   =>  $ruanganPoadcast,
        ]);
    }

    public function update(RuanganPoadcast $ruanganPoadcast, Request $request){
        $rules = [
            'nama_ruangan'      => 'required',
            'deskripsi'         => 'required',
            'kapasitas'         => 'required|numeric',
            'lokasi'            => 'required',
            'harga_sewa'        => 'required|numeric',
            'foto'              => 'image|mimes:jpeg,png,jpg|max:2048', // Ganti ini sesuai dengan kebutuhan
        ];

        $text = [
            'nama_ruangan.required'     => 'Nama Ruangan harus diisi',
            'deskripsi.required'        => 'Deskripsi harus diisi',
            'kapasitas.required'        => 'Kapasitas harus diisi',
            'kapasitas.numeric'         => 'Kapasitas harus berupa angka',
            'lokasi.required'           => 'Lokasi harus diisi',
            'harga_sewa.required'       => 'Harga Sewa harus diisi',
            'harga_sewa.numeric'        => 'Harga Sewa harus berupa angka',
            'foto.image'                => 'Foto harus berupa gambar',
            'foto.mimes'                => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif',
            'foto.max'                  => 'Ukuran maksimum gambar adalah 2MB',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $model = $request->all();
        $model['foto'] = $ruanganPoadcast->foto;
        $filePath = public_path('upload/foto_ruangan/' . $ruanganPoadcast->foto);
        if ($request->hasFile('foto')){
            if (!$ruanganPoadcast->foto == NULL){
                unlink($filePath);
            }
            $model['foto'] = Str::slug($model['nama_ruangan'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/foto_ruangan/'), $model['foto']);
        }

        $update = $ruanganPoadcast->update([
            'nama_ruangan'  =>  $request->nama_ruangan,
            'deskripsi'     =>  $request->deskripsi,
            'kapasitas'     =>  $request->kapasitas,
            'lokasi'        =>  $request->lokasi,
            'harga_sewa'    =>  $request->harga_sewa,
            'foto'          =>  $model['foto'],
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Ruangan Poadcast Berhasil Diubah',
                'url'   =>  url('/ruangan_poadcast/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Ruangan Poadcast Gagal Diubah'],422);
        }
    }

    public function delete(RuanganPoadcast $ruanganPoadcast){
        $delete = $ruanganPoadcast->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Ruangan Poadcast Berhasil dihapus',
                'url'   =>  url('/ruangan_poadcast/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Ruangan Poadcast Gagal dihapus'],422);
        }
    }
}
