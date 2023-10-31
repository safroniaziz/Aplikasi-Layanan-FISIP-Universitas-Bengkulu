<?php

namespace Database\Seeders;

use App\Models\MessageTema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemaKonselingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = MessageTema::create([
            'tema' => 'tes',
        ]);
    }
}
