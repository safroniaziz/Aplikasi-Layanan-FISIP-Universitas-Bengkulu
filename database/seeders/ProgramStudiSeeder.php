<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('program_studis')->insert([
            [
                'kode' => '252025',
                'nama_prodi' => 'KESEJAHTERAAN SOSIAL (S1)',
                'nama_fakultas' => 'ILMU SOSIAL DAN ILMU POLITIK',
                'created_at' => '2023-10-04 07:33:55',
                'updated_at' => '2023-10-04 07:33:55',
            ],
            [
                'kode' => '252055',
                'nama_prodi' => 'ADMINISTRASI PUBLIK (S1)',
                'nama_fakultas' => 'ILMU SOSIAL DAN ILMU POLITIK',
                'created_at' => '2023-10-04 07:36:59',
                'updated_at' => '2023-10-04 07:36:59',
            ],
            [
                'kode' => '252063',
                'nama_prodi' => 'SOSIOLOGI (S1)',
                'nama_fakultas' => 'ILMU SOSIAL DAN ILMU POLITIK',
                'created_at' => '2023-10-04 07:38:31',
                'updated_at' => '2023-10-04 07:38:31',
            ],
            [
                'kode' => '252071',
                'nama_prodi' => 'ILMU KOMUNIKASI (S1)',
                'nama_fakultas' => 'ILMU SOSIAL DAN ILMU POLITIK',
                'created_at' => '2023-10-04 07:37:57',
                'updated_at' => '2023-10-04 07:37:57',
            ],
            [
                'kode' => '252166',
                'nama_prodi' => 'PERPUSTAKAAN DAN SAINS INFORMASI (S1)',
                'nama_fakultas' => 'ILMU SOSIAL DAN ILMU POLITIK',
                'created_at' => '2023-10-04 07:34:47',
                'updated_at' => '2023-10-04 07:34:47',
            ],
            [
                'kode' => '252167',
                'nama_prodi' => 'JURNALISTIK (S1)',
                'nama_fakultas' => 'ILMU SOSIAL DAN ILMU POLITIK',
                'created_at' => '2023-10-04 07:36:35',
                'updated_at' => '2023-10-04 07:36:35',
            ],
            [
                'kode' => '57',
                'nama_prodi' => 'PERPUSTAKAAN (D3)',
                'nama_fakultas' => 'ILMU SOSIAL DAN ILMU POLITIK',
                'created_at' => '2023-10-04 07:32:23',
                'updated_at' => '2023-10-04 07:32:23',
            ],
            [
                'kode' => '58',
                'nama_prodi' => 'JURNALISTIK (D3)',
                'nama_fakultas' => 'ILMU SOSIAL DAN ILMU POLITIK',
                'created_at' => '2023-10-04 07:32:55',
                'updated_at' => '2023-10-04 07:32:55',
            ],
            [
                'kode' => '59',
                'nama_prodi' => 'ADMINISTRASI PERKANTORAN (D3)',
                'nama_fakultas' => 'ILMU SOSIAL DAN ILMU POLITIK',
                'created_at' => '2023-10-04 07:33:28',
                'updated_at' => '2023-10-04 07:33:28',
            ],
            [
                'kode' => '63101',
                'nama_prodi' => 'ADMINISTRASI PUBLIK (S2)',
                'nama_fakultas' => 'ILMU SOSIAL DAN ILMU POLITIK',
                'created_at' => '2023-10-04 07:39:53',
                'updated_at' => '2023-10-04 07:39:53',
            ],
            [
                'kode' => '63102',
                'nama_prodi' => 'KESEJAHTERAAN SOSIAL (S2)',
                'nama_fakultas' => 'ILMU SOSIAL DAN ILMU POLITIK',
                'created_at' => '2023-10-04 07:39:19',
                'updated_at' => '2023-10-04 07:39:19',
            ],
            [
                'kode' => '70101',
                'nama_prodi' => 'ILMU KOMUNIKASI (S2)',
                'nama_fakultas' => 'ILMU SOSIAL DAN ILMU POLITIK',
                'created_at' => '2023-10-04 07:40:18',
                'updated_at' => '2023-10-04 07:40:18',
            ],
        ]);
    }
}
