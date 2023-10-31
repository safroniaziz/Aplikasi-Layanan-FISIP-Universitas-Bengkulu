<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ruangan_kelas = [
            [
                'id' => 1,
                'nama_ruangan_kelas' => 'Ruangan 1',
                'created_at' => '2023-10-05 11:39:51',
                'updated_at' => '2023-10-05 11:42:22',
                'deleted_at' => NULL,
            ],
            [
                'id' => 2,
                'nama_ruangan_kelas' => 'Ruangan 2',
                'created_at' => '2023-10-05 11:39:59',
                'updated_at' => '2023-10-05 11:42:11',
                'deleted_at' => NULL,
            ],
            [
                'id' => 3,
                'nama_ruangan_kelas' => 'Ruangan 3',
                'created_at' => '2023-10-05 11:40:52',
                'updated_at' => '2023-10-05 11:41:57',
                'deleted_at' => NULL,
            ],
            [
                'id' => 4,
                'nama_ruangan_kelas' => 'Ruangan 4',
                'created_at' => '2023-10-05 11:41:42',
                'updated_at' => '2023-10-05 11:41:42',
                'deleted_at' => NULL,
            ],
            [
                'id' => 5,
                'nama_ruangan_kelas' => 'Ruangan 5',
                'created_at' => '2023-10-05 11:42:35',
                'updated_at' => '2023-10-05 11:42:35',
                'deleted_at' => NULL,
            ],
            [
                'id' => 6,
                'nama_ruangan_kelas' => 'Ruangan 6',
                'created_at' => '2023-10-05 11:42:43',
                'updated_at' => '2023-10-05 11:42:43',
                'deleted_at' => NULL,
            ],
            [
                'id' => 7,
                'nama_ruangan_kelas' => 'Ruangan 7',
                'created_at' => '2023-10-05 11:42:51',
                'updated_at' => '2023-10-05 11:42:51',
                'deleted_at' => NULL,
            ],
            [
                'id' => 8,
                'nama_ruangan_kelas' => 'Ruangan 8',
                'created_at' => '2023-10-05 11:42:58',
                'updated_at' => '2023-10-05 11:42:58',
                'deleted_at' => NULL,
            ],
            [
                'id' => 9,
                'nama_ruangan_kelas' => 'Ruangan 9',
                'created_at' => '2023-10-05 11:43:06',
                'updated_at' => '2023-10-05 11:43:06',
                'deleted_at' => NULL,
            ],
            [
                'id' => 10,
                'nama_ruangan_kelas' => 'Ruangan 10',
                'created_at' => '2023-10-05 11:43:13',
                'updated_at' => '2023-10-05 11:43:13',
                'deleted_at' => NULL,
            ],
            [
                'id' => 11,
                'nama_ruangan_kelas' => 'Ruangan11',
                'created_at' => '2023-10-05 11:43:19',
                'updated_at' => '2023-10-05 11:43:19',
                'deleted_at' => NULL,
            ],
            [
                'id' => 12,
                'nama_ruangan_kelas' => 'Ruangan12',
                'created_at' => '2023-10-05 11:43:27',
                'updated_at' => '2023-10-05 11:43:27',
                'deleted_at' => NULL,
            ],
            [
                'id' => 13,
                'nama_ruangan_kelas' => 'Ruangan 13',
                'created_at' => '2023-10-05 11:43:35',
                'updated_at' => '2023-10-05 11:43:35',
                'deleted_at' => NULL,
            ],
            [
                'id' => 14,
                'nama_ruangan_kelas' => 'Ruangan 14',
                'created_at' => '2023-10-05 11:43:42',
                'updated_at' => '2023-10-05 11:43:42',
                'deleted_at' => NULL,
            ],
            [
                'id' => 15,
                'nama_ruangan_kelas' => 'Ruangan 15',
                'created_at' => '2023-10-05 11:43:51',
                'updated_at' => '2023-10-05 11:43:51',
                'deleted_at' => NULL,
            ],
            [
                'id' => 16,
                'nama_ruangan_kelas' => 'Ruangan 16',
                'created_at' => '2023-10-05 11:43:57',
                'updated_at' => '2023-10-05 11:43:57',
                'deleted_at' => NULL,
            ],
            [
                'id' => 17,
                'nama_ruangan_kelas' => 'Ruangan 17',
                'created_at' => '2023-10-05 11:44:03',
                'updated_at' => '2023-10-05 11:44:03',
                'deleted_at' => NULL,
            ],
            [
                'id' => 18,
                'nama_ruangan_kelas' => 'Ruangan 18',
                'created_at' => '2023-10-05 11:44:12',
                'updated_at' => '2023-10-05 11:44:12',
                'deleted_at' => NULL,
            ],
            [
                'id' => 19,
                'nama_ruangan_kelas' => 'Ruangan 19',
                'created_at' => '2023-10-05 11:44:21',
                'updated_at' => '2023-10-05 11:44:21',
                'deleted_at' => NULL,
            ],
            [
                'id' => 20,
                'nama_ruangan_kelas' => 'Ruangan 20',
                'created_at' => '2023-10-05 11:44:34',
                'updated_at' => '2023-10-05 11:44:34',
                'deleted_at' => NULL,
            ],
            [
                'id' => 21,
                'nama_ruangan_kelas' => 'Ruangan 21',
                'created_at' => '2023-10-05 11:44:43',
                'updated_at' => '2023-10-05 11:44:43',
                'deleted_at' => NULL,
            ],
            [
                'id' => 22,
                'nama_ruangan_kelas' => 'Ruangan 22',
                'created_at' => '2023-10-05 11:44:49',
                'updated_at' => '2023-10-05 11:44:49',
                'deleted_at' => NULL,
            ],
            [
                'id' => 23,
                'nama_ruangan_kelas' => 'Ruangan 23',
                'created_at' => '2023-10-05 11:44:56',
                'updated_at' => '2023-10-05 11:44:56',
                'deleted_at' => NULL,
            ],
            [
                'id' => 24,
                'nama_ruangan_kelas' => 'Ruangan 24',
                'created_at' => '2023-10-05 11:45:06',
                'updated_at' => '2023-10-05 11:45:06',
                'deleted_at' => NULL,
            ],
            [
                'id' => 25,
                'nama_ruangan_kelas' => 'Ruangan 25',
                'created_at' => '2023-10-05 11:45:13',
                'updated_at' => '2023-10-05 11:45:13',
                'deleted_at' => NULL,
            ],
        ];

        DB::table('ruangan_kelas')->insert($ruangan_kelas);
    }
}
