<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JenisSurat;
use App\Models\RequirementSurat;
use Illuminate\Support\Facades\Auth;
use App\Models\PermohonanSurat as ModelsPermohonanSurat;

class PermohonanSurat extends Component
{
    public $jenisSurats;
    public $requirementSurats;
    public $jenis_surat_id;
    public $keperluan;
    public $showDiv;
    public $notif;
    public $permohonans;
    public function render()
    {
        $this->permohonans = ModelsPermohonanSurat::where('user_id', Auth::user()->id)->get();
        $this->jenisSurats = JenisSurat::all();
        $this->requirementSurat = RequirementSurat::all();
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
        ModelsPermohonanSurat::create([
            'jenis_surat_id'    => $this->jenis_surat_id,
            'keperluan'    => $this->keperluan,
            'user_id'       =>  Auth::user()->id,
            'status'        => 'terkirim',
        ]);
        $this->notif = true;

    }
}
