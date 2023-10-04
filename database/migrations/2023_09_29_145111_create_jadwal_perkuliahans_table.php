<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_perkuliahan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mata_kuliah_id');
            $table->unsignedBigInteger('ruangan_kelas_id');
            $table->string('hari');
            $table->string('waktu_mulai');
            $table->string('waktu_selesai');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('mata_kuliah_id')->references('id')->on('mata_kuliahs');
            $table->foreign('ruangan_kelas_id')->references('id')->on('ruangan_kelas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_perkuliahans');
    }
};
