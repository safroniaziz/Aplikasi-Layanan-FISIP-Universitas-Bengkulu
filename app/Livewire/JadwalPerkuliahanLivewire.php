<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Pengampu;
use App\Models\JadwalSetting;
use App\Models\JadwalPerkuliahan;
use App\Models\JadwalSettingFooter;
use Illuminate\Support\Facades\Date;
use App\Models\JadwalPerkuliahanStatus;

class JadwalPerkuliahanLivewire extends Component
{
    public $tanggal;
    public $jadwalPerProdiBerlangsung ;
    public $jadwalPerProdiBelumMulai ;
    public $jumlahLoop;
    public $jumlahLoopBelumMulai;
    public $cekJadwal;
    public $cekJadwalBelumMulai;
    public $jam;
    public $link;
    public $footer;

    public function link() {
        $link =  JadwalSetting::all();
        $footer =  JadwalSettingFooter::where('jadwal_setting_id', $link[0]->id)->where('visible', 1)->get();
        $this->footer = $footer;
        $this->link = $link[0]->link_youtube;
    }




    public function jadwalBerlangsung()
    {
        setlocale(LC_ALL, 'IND');
        $now = Carbon::now();
        $jadwalPerProdiBerlangsung = [];

        $jadwalBerlangsung = JadwalPerkuliahan::select(['jadwal_perkuliahans.*', 'mata_kuliahs.nama_mata_kuliah', 'program_studis.nama_prodi', 'ruangan_kelas.nama_ruangan_kelas', 'mata_kuliahs.prodi_kode'])
        ->join('mata_kuliahs', 'jadwal_perkuliahans.mata_kuliah_id', '=', 'mata_kuliahs.id')
        ->join('program_studis', 'program_studis.kode', '=', 'mata_kuliahs.prodi_kode')
        ->join('ruangan_kelas', 'ruangan_kelas.id', '=', 'jadwal_perkuliahans.ruangan_kelas_id')
        // ->where('hari', 'Senin')
        ->where('hari', $now->formatLocalized('%A'))
        ->whereRaw('CURRENT_TIME BETWEEN STR_TO_DATE(waktu_mulai, "%H.%i") and STR_TO_DATE(waktu_selesai, "%H.%i")')
        ->orderBy('waktu_mulai', 'ASC')
        ->get();

        foreach ($jadwalBerlangsung as $jadwal) {
            $prodiKode = $jadwal->nama_prodi;
            if (!isset($jadwalPerProdiBerlangsung[$prodiKode])) {
                $jadwalPerProdiBerlangsung[$prodiKode] = [
                    'prodi_kode' => $jadwal->prodi_kode,
                    'nama_prodi' => $prodiKode,
                    'jadwal' => [],
                ];
            }

            $pengampuh = Pengampu::select('nama_dosen')->join('dosens', 'pengampus.dosen_nip', '=', 'dosens.nip')->where('pengampus.mata_kuliah_id', $jadwal->mata_kuliah_id)->where('is_active', 1)->first();
            $batal = JadwalPerkuliahanStatus::select('is_cancel')->where('jadwal_perkuliahan_id', $jadwal->id)->where('tanggal', $now->toDateString())->first();

            if ($batal) {
                $batal = $batal->is_cancel;
            } else {
                $batal = 0;
            }
;
            if ($pengampuh) {
                $nama_dosen = $pengampuh->nama_dosen;
            } else {
                $nama_dosen = '-';
            }

            $jadwalPerProdiBerlangsung[$prodiKode]['jadwal'][] = [
                'id' => $jadwal->id,
                'mata_kuliah_id' => $jadwal->mata_kuliah_id,
                'ruangan_kelas_id' => $jadwal->ruangan_kelas_id,
                'hari' => $jadwal->hari,
                'waktu_mulai' => $jadwal->waktu_mulai,
                'waktu_selesai' => $jadwal->waktu_selesai,
                'created_at' => $jadwal->created_at,
                'updated_at' => $jadwal->updated_at,
                'deleted_at' => $jadwal->deleted_at,
                'nama_mata_kuliah' => $jadwal->nama_mata_kuliah,
                'nama_prodi' => $jadwal->nama_prodi,
                'nama_ruangan_kelas' => $jadwal->nama_ruangan_kelas,
                'pengampuh' => $nama_dosen,
                'batal' => $batal,

            ];
        }

        $jumlahLoop = 0;

        foreach ($jadwalPerProdiBerlangsung as $prodiData) {
            $jadwalsProdi = $prodiData['jadwal'];
            foreach ($jadwalsProdi as $index => $jadwal) {
                if (($index + 1) % 6 == 0) {
                    $jumlahLoop++;
                } elseif (($index + 1) == count($jadwalsProdi)) {
                    $jumlahLoop++;
                }
            }
        }

        $this->cekJadwal = $jadwalBerlangsung->count();
        $this->jadwalPerProdiBerlangsung = $jadwalPerProdiBerlangsung;
        $this->jumlahLoop = $jumlahLoop;

    }


    public function jadwalBelumMulai()
    {
        setlocale(LC_ALL, 'IND');
        $now = Carbon::now();

        $jadwalPerProdiBelumMulai = [];


        $jadwalBelumMulai = JadwalPerkuliahan::select(['jadwal_perkuliahans.*', 'mata_kuliahs.nama_mata_kuliah', 'program_studis.nama_prodi', 'ruangan_kelas.nama_ruangan_kelas', 'mata_kuliahs.prodi_kode'])
        ->join('mata_kuliahs', 'jadwal_perkuliahans.mata_kuliah_id', '=', 'mata_kuliahs.id')
        ->join('program_studis', 'program_studis.kode', '=', 'mata_kuliahs.prodi_kode')
        ->join('ruangan_kelas', 'ruangan_kelas.id', '=', 'jadwal_perkuliahans.ruangan_kelas_id')
        ->where('hari', $now->formatLocalized('%A'))
            // ->where('hari', 'Senin')
            ->whereRaw('CURRENT_TIME <= STR_TO_DATE(waktu_mulai, "%H.%i") ')
            ->orderBy('waktu_mulai', 'ASC')
            ->get();

        foreach ($jadwalBelumMulai as $jadwal2) {
            $prodiKode = $jadwal2->nama_prodi;

            if (!isset($jadwalPerProdiBelumMulai[$prodiKode])) {
                $jadwalPerProdiBelumMulai[$prodiKode] = [
                    'prodi_kode' => $jadwal2->prodi_kode,
                    'nama_prodi' => $prodiKode,
                    'jadwal' => [],
                ];
            }

            $pengampuh = Pengampu::select('nama_dosen')->join('dosens', 'pengampus.dosen_nip', '=', 'dosens.nip')->where('pengampus.mata_kuliah_id', $jadwal2->mata_kuliah_id)->where('is_active', 1)->first();
            $batal = JadwalPerkuliahanStatus::select('is_cancel')->where('jadwal_perkuliahan_id', $jadwal2->id)->where('tanggal', $now->toDateString())->first();
            if ($pengampuh) {
                $nama_dosen = $pengampuh->nama_dosen;
            } else {
                $nama_dosen = '-';
            }
            if ($batal) {
                $batal = $batal->is_cancel;
            } else {
                $batal = 0;
            }
            $jadwalPerProdiBelumMulai[$prodiKode]['jadwal'][] = [
                'id' => $jadwal2->id,
                'mata_kuliah_id' => $jadwal2->mata_kuliah_id,
                'ruangan_kelas_id' => $jadwal2->ruangan_kelas_id,
                'hari' => $jadwal2->hari,
                'waktu_mulai' => $jadwal2->waktu_mulai,
                'waktu_selesai' => $jadwal2->waktu_selesai,
                'created_at' => $jadwal2->created_at,
                'updated_at' => $jadwal2->updated_at,
                'deleted_at' => $jadwal2->deleted_at,
                'nama_mata_kuliah' => $jadwal2->nama_mata_kuliah,
                'nama_prodi' => $jadwal2->nama_prodi,
                'nama_ruangan_kelas' => $jadwal2->nama_ruangan_kelas,
                'pengampuh' => $nama_dosen,
                'batal' => $batal ,
            ];
        }

        $jumlahLoopBelumMulai = 0;

        foreach ($jadwalPerProdiBelumMulai as $prodiData2) {
            $jadwalsProdi2 = $prodiData2['jadwal'];
            foreach ($jadwalsProdi2 as $index => $jadwal) {
                if (($index + 1) % 5 == 0) {
                    $jumlahLoopBelumMulai++;
                } elseif (($index + 1) == count($jadwalsProdi2)) {
                    $jumlahLoopBelumMulai++;
                }
            }
        }

        $this->cekJadwalBelumMulai = $jadwalBelumMulai->count();
        $this->jadwalPerProdiBelumMulai = $jadwalPerProdiBelumMulai;
        $this->jumlahLoopBelumMulai = $jumlahLoopBelumMulai;

    }

    public function mount()
    {
        setlocale(LC_ALL, 'IND');
        $now = Carbon::now();
        $this->tanggal = $now->formatLocalized('%A, %d %B %Y');
    }


    public function render()
    {
        $this->jam = Date::now()->format('H:i:s');
        $this->link();
        $this->jadwalBerlangsung();
        $this->jadwalBelumMulai();
        return view('livewire.jadwal-perkuliahan2')->layout('Layouts.jadwal');;
    }
}
