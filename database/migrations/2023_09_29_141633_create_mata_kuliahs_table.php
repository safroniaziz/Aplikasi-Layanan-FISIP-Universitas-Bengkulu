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
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('prodi_kode');
            $table->string('nama_mata_kuliah');
            $table->string('kode_mata_kuliah');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('prodi_kode')->references('kode')->on('program_studis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliahs');
    }
};
