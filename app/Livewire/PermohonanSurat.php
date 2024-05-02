<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JenisSurat;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\KelengkapanSurat;
use App\Models\RequirementSurat;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WaController;
use App\Models\PermohonanSurat as ModelsPermohonanSurat;

class PermohonanSurat extends Component
{
    use WithFileUploads;

    public $requirementSurats = [];
    public $files = [];
    public $jenisSurats;
    public $jenisSurat;
    public $jenis_surat_id;
    public $keperluan;
    public $showDiv;
    public $showDivSuratTugas = false;
    public $showDivSuratPeminjamanRuangan = false;
    public $showDivSuratPeminjamanAlat = false;
    public $showdivHasil = false;
    public $notif;
    public $permohonans;
    public $search;
    public $records;

    public $nama_pegawai;
    public $nip;
    public $jabatan;
    public $unit_kerja;
    public $masa_kerja;
    public $jenis_cuti;
    public $lama_cuti;
    public $dari_tanggal;
    public $sampai_tanggal;
    public $telephone;

    public $nama_atasan;
    public $nip_atasan;
    public $nama_berwenang;
    public $nip_berwenang;

    public $asal_surat;
    public $jenis_ruangan;
    public $waktu_peminjaman;

    public $jenis_alat;
    public $tujuan_alat;


    protected $listeners = ['showNotification' => 'refreshPage'];

    public function render()
    {
        $this->permohonans = ModelsPermohonanSurat::where('user_id', Auth::user()->id)->get();
        $this->jenisSurats = JenisSurat::all();
        return view('livewire.permohonan-surat')->layout('layouts.sewa');;
    }

    public function handle_jenis_surat()
    {
        if (!empty($this->jenis_surat_id)) {
            $jenisSurat = JenisSurat::find($this->jenis_surat_id);
            $requirementSurats = RequirementSurat::where('jenis_surat_id', $this->jenis_surat_id)->get();
            if ($jenisSurat->jenis_surat == "SURAT CUTI DOSEN DAN TENDIK") {
                $this->showDivSuratTugas = true;
            }elseif ($jenisSurat->jenis_surat == "SURAT PEMINJAMAN RUANGAN") {
                $this->showDivSuratPeminjamanRuangan = true;
            }elseif ($jenisSurat->jenis_surat == "SURAT PEMINJAMAN ALAT") {
                $this->showDivSuratPeminjamanAlat = true;
            }
            if (count($requirementSurats) > 0) {
                $this->showDiv = true;
                $this->requirementSurats = $requirementSurats;
            } else {
                $this->showDiv = false;
                $this->requirementSurats = [];
            }
        } else {
            $this->showDiv = false;
            $this->requirementSurats = [];
        }
    }

    public function submitReq(){
        $this->validate([
            'jenis_surat_id' => 'required', // Sesuaikan dengan aturan validasi yang dibutuhkan
            'keperluan' => 'required',
        ]);

        $kodeUnik = Str::random(6) . mt_rand(100000, 999999);
        $jenisSurat = JenisSurat::where('id',$this->jenis_surat_id)->first();
        if ($jenisSurat->jenis_surat == "SURAT CUTI DOSEN DAN TENDIK") {
            $data = [
                'title' => 'Contoh PDF Livewire',
                'nama_pegawai' => $this->nama_pegawai,
                'jabatan' => $this->jabatan,
                'nip' => $this->nip,
                'unit_kerja' => $this->unit_kerja,
                'masa_kerja' => $this->masa_kerja,
                'jenis_cuti' => $this->jenis_cuti,
                'lama_cuti' => $this->lama_cuti,
                'dari_tanggal' => $this->dari_tanggal,
                'sampai_tanggal' => $this->sampai_tanggal,
                'telephone' => $this->telephone,
                'keperluan' =>  $this->keperluan,
                'nama_atasan' =>  $this->nama_atasan,
                'nip_atasan' =>  $this->nip_atasan,
                'nama_berwenang' =>  $this->nama_berwenang,
                'nip_berwenang' =>  $this->nip_berwenang,
            ];

            $pdf = \PDF::loadView('livewire.surat_cuti', $data);
            $pdf->setPaper('legal');
            // Simpan PDF ke direktori public
            $filePath = public_path('pdf/surat_cuti.pdf');
            $pdf->save($filePath);

            // Arahkan pengguna ke halaman PDF
            return redirect()->route('permohonanSurat.cetak');
        }elseif ($jenisSurat->jenis_surat == "SURAT PEMINJAMAN RUANGAN") {
            $permohonan = ModelsPermohonanSurat::create([
                'jenis_surat_id' => $this->jenis_surat_id,
                'keperluan' => $this->keperluan,
                'user_id' => Auth::user()->id,
                'status' => 'terkirim',
                'nomor_tiket'   => $kodeUnik,
                'asal_surat'    => $this->asal_surat,
                'waktu_peminjaman'    => $this->waktu_peminjaman,
                'jenis_ruangan'    => $this->jenis_ruangan,
            ]);
        }elseif ($jenisSurat->jenis_surat == "SURAT PEMINJAMAN ALAT") {
            $permohonan = ModelsPermohonanSurat::create([
                'jenis_surat_id' => $this->jenis_surat_id,
                'keperluan' => $this->keperluan,
                'user_id' => Auth::user()->id,
                'status' => 'terkirim',
                'nomor_tiket'   => $kodeUnik,
                'jenis_alat'    => $this->jenis_alat,
                'tujuan_alat'    => $this->tujuan_alat,
            ]);
        }else{
            $permohonan = ModelsPermohonanSurat::create([
                'jenis_surat_id' => $this->jenis_surat_id,
                'keperluan' => $this->keperluan,
                'user_id' => Auth::user()->id,
                'status' => 'terkirim',
                'nomor_tiket'   => $kodeUnik,
            ]);
        }

        foreach ($this->files as $reqId => $file) {
            // Pastikan ID ditemukan sebelum membuat KelengkapanSurat
            $requirementSurat = RequirementSurat::find($reqId);
            if ($requirementSurat) {
                try {
                    // Lakukan operasi penyimpanan file
                    $fileName = $file->store('kelengkapan_surat', 'public');

                    // Buat KelengkapanSurat
                    KelengkapanSurat::create([
                        'permohonan_surat_id' => $permohonan->id,
                        'nama_kelengkapan' => $requirementSurat->requirement,
                        'file_path' => $fileName,
                    ]);
                } catch (\Exception $e) {
                    // Tangani kesalahan penyimpanan file, contoh: log kesalahan
                    Log::error('Gagal menyimpan file: ' . $e->getMessage());
                }
            } else {
                // ID tidak ditemukan, contoh: log kesalahan atau tangani dengan cara lain
                Log::error('ID ' . $reqId . ' tidak ditemukan di RequirementSurat.');
            }
        }

        $target = Auth::user()->no_hp;
        $token = "GnqX5TyqEf8xGuLnroy-";
        $messageController = new WaController();
        $message = "Halo '".Auth::user()->name."', permohonan pembuatan surat anda berhasil, Nomor Tiket permohonan anda adalah : ".$kodeUnik;
        $response = $messageController->sendWa($token, $target, $message);

        $this->notif = true;
    }

    public function searchResult()
    {
        if (!empty($this->search)) {
            $hasil = ModelsPermohonanSurat::where('nomor_tiket',$this->search)->first();
            if ($hasil != null && $hasil != "") {
                $this->showdivHasil = true;
                $this->records = $hasil;
            }else {
                $this->records = [];

            }
        } else {
            $this->showdivHasil = false;
        }
    }
}
