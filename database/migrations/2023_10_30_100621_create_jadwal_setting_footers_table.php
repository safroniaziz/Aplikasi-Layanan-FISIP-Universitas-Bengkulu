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
        Schema::create('jadwal_setting_footers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jadwal_setting_id');
            $table->text('text_footer');
            $table->boolean('visible')->default(1);
            $table->timestamps();
            $table->foreign('jadwal_setting_id')->references('id')->on('jadwal_settings');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_setting_footers');
    }
};
