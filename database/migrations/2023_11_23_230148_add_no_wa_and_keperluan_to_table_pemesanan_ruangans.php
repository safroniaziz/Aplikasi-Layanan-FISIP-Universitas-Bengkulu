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
        Schema::table('pemesanan_ruangans', function (Blueprint $table) {
            $table->string('no_wa')->after('mahasiswa_npm');
            $table->string('keperluan')->after('no_wa');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanan_ruangans', function (Blueprint $table) {
            $table->dropColumn('no_wa');
            $table->dropColumn('keperluan');

        });
    }
};
