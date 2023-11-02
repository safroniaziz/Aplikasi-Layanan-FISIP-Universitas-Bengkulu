<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JadwalSetting;
use App\Models\JadwalSettingFooter;
use Illuminate\Support\Facades\Date;

class JadwalSettingViewLivewire extends Component
{
    public $link;
    public $footer;
    public $id_youtube;
    public $jam;

    public function link()
    {
        $link =  JadwalSetting::all();
        if ($link->count() != 0) {
            $footer =  JadwalSettingFooter::where('jadwal_setting_id', $link[0]->id)->where('visible', 1)->get();
            $this->footer = $footer;
            $this->link = $link[0]->link_youtube;
            $this->id_youtube = $link[0]->link_youtube;


        }
    }


    public function simpan()
    {
        $id_youtube = $this->id_youtube;
        JadwalSetting::updateOrCreate(['id' => 1],[
                 'link_youtube' => $id_youtube
        ]);
    }

    public function render()
    {
        $this->jam = Date::now()->format('H:i:s');
        $this->link();
        return view('livewire.jadwal-setting-view-livewire');
    }
}
