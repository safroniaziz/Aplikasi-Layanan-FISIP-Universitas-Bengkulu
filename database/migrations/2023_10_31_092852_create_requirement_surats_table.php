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
        Schema::create('requirement_surats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_surat_id');
            $table->string('requirement');
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('jenis_surat_id')->references('id')->on('jenis_surats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirement_surats');
    }
};
