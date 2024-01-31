<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SuratTugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;

class SuratTugasController extends Controller
{
    public function index(){
        if (!Gate::allows('jenisSurat.kelengkapan')) {
            abort(403);
        }
        $suratTugass = SuratTugas::withCount(['anggotas'])->orderBy('created_at','desc')->get();

        // Mendapatkan Tanggal Sekarang
        $tanggalSekarang = Carbon::now()->format('d');

        // Mendapatkan Bulan Sekarang (Nama Bulan Indonesia)
        $bulanSekarang = Carbon::now()->locale('id')->monthName;

        // Mendapatkan Tahun Sekarang
        $tahunSekarang = Carbon::now()->year;

        return view('backend/suratTugas.index',[
            'suratTugass'   =>  $suratTugass,
            'tanggalSekarang'   =>  $tanggalSekarang,
            'bulanSekarang'   =>  $bulanSekarang,
            'tahunSekarang'   =>  $tahunSekarang,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'nomor_surat' => 'required',
            'deskripsi_tugas' => 'required',
            'tanggal_kegiatan' => 'required',
            'kepala_tanda_tangan' => 'required',
            'jabatan_yang_bertanda_tangan' => 'required',
            'nama_yang_bertanda_tangan' => 'required',
            'nip_yang_bertanda_tangan' => 'required',
        ];

        $text = [
            'nomor_surat.required' => 'Nomor Surat harus diisi.',
            'deskripsi_tugas.required' => 'Deskripsi Tugas harus diisi.',
            'deskripsi_tugas.unique' => 'Deskripsi Tugas sudah ada.',
            'tanggal_kegiatan.required' => 'Tanggal Kegiatan harus diisi.',
            'kepala_tanda_tangan.required' => 'Kepala Tanda Tangan harus diisi.',
            'jabatan_yang_bertanda_tangan.required' => 'Jabatan yang Tanda Tangan harus diisi.',
            'nama_yang_bertanda_tangan.required' => 'Nama yang Tanda Tangan harus diisi.',
            'nip_yang_bertanda_tangan.required' => 'NIP yang Tanda Tangan harus diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $text);

        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $create = SuratTugas::create([
            'nomor_surat' => $request->nomor_surat,
            'deskripsi_tugas' => $request->deskripsi_tugas,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'kepala_tanda_tangan' => $request->kepala_tanda_tangan,
            'jabatan_yang_tanda_tangan' => $request->jabatan_yang_bertanda_tangan,
            'nama_yang_tanda_tangan' => $request->nama_yang_bertanda_tangan,
            'nip_yang_tanda_tangan' => $request->nip_yang_bertanda_tangan,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Surat Tugas Berhasil Ditambahkan',
                'url'   =>  route('suratTugas'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Surat Tugas Gagal Ditambahkan'],422);
        }
    }

    public function edit(SuratTugas $suratTugas){
        return $suratTugas;
    }

    public function update(Request $request){
        $rules = [
            'nomor_surat' => 'required',
            'deskripsi_tugas' => 'required',
            'tanggal_kegiatan' => 'required',
            'kepala_tanda_tangan' => 'required',
            'jabatan_yang_bertanda_tangan' => 'required',
            'nama_yang_bertanda_tangan' => 'required',
            'nip_yang_bertanda_tangan' => 'required',
        ];

        $text = [
            'nomor_surat.required' => 'Nomor Surat harus diisi.',
            'deskripsi_tugas.required' => 'Deskripsi Tugas harus diisi.',
            'deskripsi_tugas.unique' => 'Deskripsi Tugas sudah ada.',
            'tanggal_kegiatan.required' => 'Tanggal Kegiatan harus diisi.',
            'kepala_tanda_tangan.required' => 'Kepala Tanda Tangan harus diisi.',
            'jabatan_yang_bertanda_tangan.required' => 'Jabatan yang Tanda Tangan harus diisi.',
            'nama_yang_bertanda_tangan.required' => 'Nama yang Tanda Tangan harus diisi.',
            'nip_yang_bertanda_tangan.required' => 'NIP yang Tanda Tangan harus diisi.',
        ];
        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $create = SuratTugas::where('id',$request->id)->update([
            'nomor_surat' => $request->nomor_surat,
            'deskripsi_tugas' => $request->deskripsi_tugas,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'kepala_tanda_tangan' => $request->kepala_tanda_tangan,
            'jabatan_yang_tanda_tangan' => $request->jabatan_yang_bertanda_tangan,
            'nama_yang_tanda_tangan' => $request->nama_yang_bertanda_tangan,
            'nip_yang_tanda_tangan' => $request->nip_yang_bertanda_tangan,
        ]);

        if ($create) {
            return response()->json([
                'text'  =>  'Yeay, Surat Tugas Berhasil Diubah',
                'url'   =>  route('suratTugas'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Surat Tugas Gagal Diubah'],422);
        }
    }

    public function delete(SuratTugas $suratTugas){
        $delete = $suratTugas->delete();
        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, Surat Tugas Berhasil dihapus',
                'url'   =>  url('/surat_tugas/'),
            ]);
        }else{
            return response()->json(['error'  =>  0, 'text'   =>  'Ooopps, Surat Tugas Gagal dihapus'],422);
        }
    }

    public function cetak(SuratTugas $suratTugas){
        $suratTugas = SuratTugas::with(['anggotas'])->where('id',$suratTugas->id)->first();
        $pdf = Pdf::loadView('backend.suratTugas.cetak',[
            'suratTugas'        =>  $suratTugas,
        ]);
        $pdf->setPaper('a4','portrait');
        return $pdf->stream('cetak_surat_tugas' . Carbon::now() . '.pdf');
    }
}
