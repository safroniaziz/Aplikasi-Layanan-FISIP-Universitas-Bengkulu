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
        Schema::table('mata_kuliahs', function (Blueprint $table) {
            $table->integer('sks')->after('kode_mata_kuliah');
            $table->integer('semester')->after('sks');
            $table->string('keterangan')->after('semester');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mata_kuliahs', function (Blueprint $table) {
            $table->dropColumn('sks');
            $table->dropColumn('semester');
            $table->dropColumn('keterangan');
        });
    }
};
