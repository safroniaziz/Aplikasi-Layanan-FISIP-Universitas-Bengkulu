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
        Schema::table('pendaftaran_konselings', function (Blueprint $table) {
            $table->timestamp('tanggal_dan_waktu_mulai')->nullable()->change();
            $table->timestamp('tanggal_dan_waktu_selesai')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran_konselings', function (Blueprint $table) {
            //
        });
    }
};
