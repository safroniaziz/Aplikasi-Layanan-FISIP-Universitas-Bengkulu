<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengampu;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use App\Models\JadwalPerkuliahan;

class JadwalController extends Controller
{
    public function index()
    {
        setlocale(LC_ALL, 'IND');
        $now = Carbon::now();
        $jadwalPerProdiBerlangsung = [];
        $jadwalPerProdiBelumMulai = [];
        // $prodis = ProgramStudi::all();
        // foreach ($prodis as $prodi) {
        //     $jadwalBerlangsung = JadwalPerkuliahan::select(['jadwal_perkuliahans.*', 'mata_kuliahs.nama_mata_kuliah', 'program_studis.nama_prodi', 'ruangan_kelas.nama_ruangan_kelas'])->join('mata_kuliahs', 'jadwal_perkuliahans.mata_kuliah_id', '=', 'mata_kuliahs.id')->join('program_studis', 'program_studis.kode', '=', 'mata_kuliahs.prodi_kode')->join(
        //         'ruangan_kelas',
        //         'ruangan_kelas.id',
        //         '=',
        //         'jadwal_perkuliahans.ruangan_kelas_id'
        //     )->where('mata_kuliahs.prodi_kode', $prodi->kode)->limit(2)->get();
        //     $jadwalPerProdiBerlangsung[$prodi->kode] = $jadwals;
        // }
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
            if ($pengampuh) {
                $nama_dosen = $pengampuh->nama_dosen;
            }else {
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
            ];
        }

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
            if ($pengampuh) {
                $nama_dosen = $pengampuh->nama_dosen;
            } else {
                $nama_dosen = '-';
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
            ];
        }
        // $iteration = 1;
        // $i = 1;

        // foreach ($jadwalPerProdi as $prodiData) {
        //     $prodiId = $prodiData['prodi_kode'];
        //     $prodiNama = $prodiData['nama_prodi'];
        //     $jadwalsProdi = $prodiData['jadwal'];

        //     echo "Iterasi ke-$iteration - Prodi ID: $prodiId, Nama Prodi: $prodiNama <br>";

        //     foreach ($jadwalsProdi as $index => $jadwal) {
        //         echo $index . ".  ";
        //         echo "Mata Kuliah: " . $jadwal['nama_mata_kuliah'] . "<br>";

        //         if (($index + 1) % 5 == 0) {
        //             // echo $index . ".  ";
        //             // echo "Mata Kuliah: " . $jadwal['nama_mata_kuliah'] . "<br>";
        //             echo "$i. =============" . count($jadwalsProdi) . "<br>";

        //             $i++;
        //         } elseif (($index + 1) == count($jadwalsProdi)) {
        //             // echo $index . ".  ";
        //             // echo "Mata Kuliah: " . $jadwal['nama_mata_kuliah'] . "<br>";
        //             echo "$i. ============= ". count($jadwalsProdi)."<br>";
        //             $i++;
        //         }
        //     }

        //     $iteration++;
        // }die();
        $iteration = 1;
        $jumlahLoop = 0;

        foreach ($jadwalPerProdiBerlangsung as $prodiData) {
            $jadwalsProdi = $prodiData['jadwal'];
            foreach ($jadwalsProdi as $index => $jadwal) {
                if (($index + 1) % 5 == 0) {
                    $jumlahLoop++;
                } elseif (($index + 1) == count($jadwalsProdi)) {
                    $jumlahLoop++;
                }
            }
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



        return view('frontend.jadwal', [
            'jadwalPerProdiBerlangsung'    =>  $jadwalPerProdiBerlangsung,
            'jadwalPerProdiBelumMulai'    =>  $jadwalPerProdiBelumMulai,
            'jumlahLoop'    =>  $jumlahLoop,
            'jumlahLoopBelumMulai'    =>  $jumlahLoopBelumMulai,
            'tanggal'       => $now->formatLocalized('%A, %d %B %Y'),
            'cekJadwal'     => $jadwalBerlangsung->count(),
            'cekJadwalBelumMulai'     => $jadwalBelumMulai->count(),
        ]);
    }
}
