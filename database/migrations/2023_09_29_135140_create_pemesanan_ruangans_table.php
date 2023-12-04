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
        Schema::create('pemesanan_ruangans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('ruangan_id');
            $table->string('mahasiswa_npm')->nullable();
            $table->timestamp('tanggal_dan_waktu_mulai')->nullable();
            $table->timestamp('tanggal_dan_waktu_selesai')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ruangan_id')->references('id')->on('ruangan_poadcasts');
            $table->foreign('mahasiswa_npm')->references('npm')->on('mahasiswas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan_ruangans');
    }
};
