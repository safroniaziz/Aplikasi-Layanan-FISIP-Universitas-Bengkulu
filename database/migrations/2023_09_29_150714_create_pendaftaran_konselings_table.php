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
        Schema::create('pendaftaran_konselings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->timestamp('tanggal_dan_waktu_mulai')->nullable();
            $table->timestamp('tanggal_dan_waktu_selesai')->nullable();
            $table->enum('status',['menunggu','terjadwal','ditolak','selesai','dibatalkan'])->default('menunggu');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_konselings');
    }
};
