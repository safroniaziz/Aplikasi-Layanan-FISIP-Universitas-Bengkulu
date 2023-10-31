<?php

namespace Database\Seeders;

use App\Models\JadwalSettingFooter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSettingFooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'jadwal_setting_id' => 1,
                'text_footer'       => 'Tingkatkan Kualitas Kinerja, FISIP UNIB Laksanakan Evaluasi Triwulan III Bidang Akademik, Sumber Daya, dan Kemahasiswaan',
                'visible'           => 1,
            ],
            [
                'jadwal_setting_id' => 1,
                'text_footer'       => 'Tingkatkan Keselamatan Berkendara, Jasa Raharja Cabang Bengkulu dan Jurusan Sosiologi FISIP UNIB Gelar Kuliah Umum',
                'visible'           => 1,
            ],
            [
                'jadwal_setting_id' => 1,
                'text_footer'       => 'Wujudkan Zona Integritas, Dekan FISIP Pimpin Apel Pagi',
                'visible'           => 1,
            ],
            [
                'jadwal_setting_id' => 1,
                'text_footer'       => 'Hadapi Tantangan di Era Disrupsi Digital, Jurusan Ilmu Komunikasi FISIP UNIB Gelar Kuliah Dosen Tamu',
                'visible'           => 1,
            ],
            [
                'jadwal_setting_id' => 1,
                'text_footer'       => 'Tingkatkan Sinergitas dan Kolaborasi, FDIK UIN Syarif Hidayatullah Jakarta Gelar Kunjungan Studi Banding ke FISIP UNIB',
                'visible'           => 1,
            ],
        ];

        foreach ($data as $textFooter) {
            $text = JadwalSettingFooter::create($textFooter);
        }
    }
}
