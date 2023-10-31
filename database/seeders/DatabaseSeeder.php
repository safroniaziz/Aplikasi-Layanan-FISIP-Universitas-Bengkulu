<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ProgramStudi;
use App\Models\RequirementSurat;
use App\Models\RuanganKelas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserRolePermissionSeeder::class);
        $this->call(JadwalSettingSeeder::class);
        $this->call(JadwalSettingFooterSeeder::class);
        $this->call(RuanganSeeder::class);
        $this->call(ProgramStudiSeeder::class);
        $this->call(MatkulSeeder::class);
        $this->call(JadwalSeeder::class);
        $this->call(PengampuSeeder::class);
        $this->call(JenisSuratSeeder::class);
        $this->call(RequirementSuratSeeder::class);
        $this->call(DosenSeeder::class);
    }
}