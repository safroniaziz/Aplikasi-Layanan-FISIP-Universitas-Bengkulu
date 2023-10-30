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
        Schema::create('jadwal_perkuliahan_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jadwal_perkuliahan_id');
            $table->boolean('is_cancel')->default(0);
            $table->date('tanggal');
            $table->timestamps();
            $table->foreign('jadwal_perkuliahan_id')->references('id')->on('jadwal_perkuliahans');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_perkuliahan_statuses');
    }
};
