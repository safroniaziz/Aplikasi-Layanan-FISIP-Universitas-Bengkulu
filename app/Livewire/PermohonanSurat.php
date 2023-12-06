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
    public $jenis_surat_id;
    public $keperluan;
    public $showDiv;
    public $showdivHasil = false;
    public $notif;
    public $permohonans;
    public $search;
    public $records;

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
            $requirementSurats = RequirementSurat::where('jenis_surat_id', $this->jenis_surat_id)->get();
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

        $permohonan = ModelsPermohonanSurat::create([
            'jenis_surat_id' => $this->jenis_surat_id,
            'keperluan' => $this->keperluan,
            'user_id' => Auth::user()->id,
            'status' => 'terkirim',
            'nomor_tiket'   => $kodeUnik,
        ]);
        
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
        $token = "VUPG2eveV7sG+9ZzEIMz";
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
