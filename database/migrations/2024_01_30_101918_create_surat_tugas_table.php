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
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->string('deskripsi_tugas');
            $table->date('tanggal_kegiatan');
            $table->string('kepala_tanda_tangan');
            $table->string('jabatan_yang_tanda_tangan');
            $table->string('nama_yang_tanda_tangan');
            $table->string('nip_yang_tanda_tangan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_tugas');
    }
};
