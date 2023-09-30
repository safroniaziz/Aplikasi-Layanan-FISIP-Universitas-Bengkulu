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
        Schema::create('alat_poadcasts', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alat');
            $table->text('deskripsi');
            $table->integer('jumlah_alat');
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
        Schema::dropIfExists('alat_poadcasts');
    }
};
