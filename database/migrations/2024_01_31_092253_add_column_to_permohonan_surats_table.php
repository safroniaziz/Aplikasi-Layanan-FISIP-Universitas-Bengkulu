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
        Schema::table('permohonan_surats', function (Blueprint $table) {
            $table->string('surat_ajuan')->nullable();
            $table->string('asal_surat')->nullable();
            $table->string('waktu_peminjaman')->nullable();
            $table->string('jenis_ruangan')->nullable();
            $table->string('jenis_alat')->nullable();
            $table->string('tujuan_alat')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permohonan_surats', function (Blueprint $table) {
            $table->dropColumn('surat_ajuan');
            $table->dropColumn('asal_surat');
            $table->dropColumn('waktu_peminjaman');
            $table->dropColumn('jenis_ruangan');
            $table->dropColumn('jenis_alat');
            $table->dropColumn('tujuan_alat');
        });
    }
};
