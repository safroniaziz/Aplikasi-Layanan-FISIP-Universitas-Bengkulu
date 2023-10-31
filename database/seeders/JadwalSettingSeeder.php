<?php

namespace Database\Seeders;

use App\Models\JadwalSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = JadwalSetting::create([
            'id'            =>  1,
            'link_youtube'  => 'XXHuJewZAdQ',
        ]);
    }
}
