<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RequirementSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RequirementSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $requirements = [
            // Jenis Surat ID 1
            [
                'jenis_surat_id' => 1,
                'requirement' => 'Surat permohonan yang ditandatangani mahasiswa bersangkutan dan orang tua/wali di atas materai.',
            ],
            [
                'jenis_surat_id' => 1,
                'requirement' => 'Surat pernyataan kesanggupan untuk membayar SPP semester sebelumnya bagi yang tidak aktif dan fotokopi surat izin cuti akademik untuk mahasiswa yang mengajukan cuti.',
            ],
            [
                'jenis_surat_id' => 1,
                'requirement' => 'SK Cuti dari Rektorat.',
            ],
            [
                'jenis_surat_id' => 1,
                'requirement' => 'Surat Pengantar dari Jurusan/Prodi.',
            ],

            // Jenis Surat ID 2
            [
                'jenis_surat_id' => 2,
                'requirement' => 'Surat permohonan yang ditandatangani mahasiswa.',
            ],
            [
                'jenis_surat_id' => 2,
                'requirement' => 'Melampirkan fotokopi KRS terakhir.',
            ],
            [
                'jenis_surat_id' => 2,
                'requirement' => 'Fotokopi KTM.',
            ],
            [
                'jenis_surat_id' => 2,
                'requirement' => 'Fotokopi Slip Bayar UKT Terakhir.',
            ],
            [
                'jenis_surat_id' => 2,
                'requirement' => 'Surat pengantar cuti dari prodi/jurusan.',
            ],

            // Jenis Surat ID 3
            [
                'jenis_surat_id' => 3,
                'requirement' => 'Membawa fotokopi SK terakhir orang tua.',
            ],
            [
                'jenis_surat_id' => 3,
                'requirement' => 'Membawa fotokopi KTM.',
            ],
            [
                'jenis_surat_id' => 3,
                'requirement' => 'Membawa fotokopi bukti bayar UKT semester berjalan.',
            ],
            [
                'jenis_surat_id' => 3,
                'requirement' => 'Mengisi formulir yang disediakan di Subbag Akademik.',
            ],

            // Jenis Surat ID 4
            [
                'jenis_surat_id' => 4,
                'requirement' => 'KTM / ATM.',
            ],
            [
                'jenis_surat_id' => 4,
                'requirement' => 'KHS semester sebelumnya.',
            ],

            // Jenis Surat ID 5
            [
                'jenis_surat_id' => 5,
                'requirement' => 'Formulir yang sudah disediakan oleh operator.',
            ],

            // Jenis Surat ID 6
            [
                'jenis_surat_id' => 6,
                'requirement' => 'Formulir yang sudah disediakan oleh operator.',
            ],
            [
                'jenis_surat_id' => 6,
                'requirement' => 'Surat pengantar dari Jurusan/Prodi.',
            ],

            // Jenis Surat ID 7
            [
                'jenis_surat_id' => 7,
                'requirement' => 'Membawa IJAZAH (Asli), TRANSKRIP (Asli) atau SERTIFIKAT AKREDITASI yang akan di legalisir.',
            ],
            [
                'jenis_surat_id' => 7,
                'requirement' => 'MAP kertas 1 pcs (warna bebas) dan ditulis nama dan jurusan/prodi.',
            ],
            [
                'jenis_surat_id' => 7,
                'requirement' => 'Mengisi (Tracer Study) melalui scan barcode yang terdapat di Subbag Akademik.',
            ],
        ];

        foreach ($requirements as $requirement) {
            RequirementSurat::create($requirement);
        }
    }
}
