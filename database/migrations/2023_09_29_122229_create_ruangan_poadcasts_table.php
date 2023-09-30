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
        Schema::create('ruangan_poadcasts', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ruangan');
            $table->text('deskripsi');
            $table->integer('kapasitas');
            $table->string('lokasi');
            $table->integer('harga_sewa');
            $table->string('foto');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangan_poadcasts');
    }
};
