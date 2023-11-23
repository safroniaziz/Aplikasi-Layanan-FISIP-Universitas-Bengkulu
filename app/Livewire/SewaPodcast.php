<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AlatPoadcast;
use App\Models\RuanganPoadcast;
use App\Models\PemesananRuangan;

class SewaPodcast extends Component
{
    public $ruanganPoadcasts ='';
    public $alatPoadcasts = '';
    public $pemesananRuangans = '';
    public $cek_waktu = '';
    public function render()
    {
        $this->ruanganPoadcasts = RuanganPoadcast::first();
        $this->alatPoadcasts = AlatPoadcast::all();
        $this->pemesananRuangans = PemesananRuangan::with('mahasiswa')->get();
        $this->cek_waktu = PemesananRuangan::pluck('tanggal_dan_waktu_mulai')->toArray();
        return view('livewire.sewa-podcast')->layout('layouts.sewa');
    }
}
