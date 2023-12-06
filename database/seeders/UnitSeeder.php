<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['nama_unit' => 'Bagian Akademik'],
            ['nama_unit' => 'Bagaian Kemahasiswaan'],
            ['nama_unit' => 'Bagian Sumber Daya'],
            ['nama_unit' => 'Program Studi'],
            ['nama_unit' => 'Tata Usaha'],
            ['nama_unit' => 'UPM'],
            ['nama_unit' => 'UKM'],
            ['nama_unit' => 'Dekan'],
        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
