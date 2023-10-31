<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisSuratData = [
            'SURAT AKTIF KULIAH KEMBALI',
            'SURAT CUTI AKADEMIK',
            'SURAT KETERANGAN MASIH KULIAH',
            'PELAYANAN KARTU RENCANA STUDI (KRS)',
            'PEMBUATAN TRANSKRIP NILAI',
            'SURAT IZIN PENELITIAN/ PRA PENELITIAN',
            'LEGALISIR IJAZAH, TRANSKRIP NILAI, DAN SERTIFIKAT AKREDITASI',
        ];

        foreach ($jenisSuratData as $jenisSurat) {
            JenisSurat::create(['jenis_surat' => $jenisSurat]);
        }
    }
}
