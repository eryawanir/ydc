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
        Schema::create('tindakans', function (Blueprint $table) {
            $table->foreignId('layanan_id')->constrained();
            $table->foreignId('rekam_medis_id')->constrained();
            $table->string('diagnosa')->nullable();
            $table->string('lokasi')->nullable();
            $table->integer('uang_masuk')->nullable();
            $table->integer('fee_dokter')->nullable();
            $table->integer('pendapatan_klinik')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tindakans', function (Blueprint $table) {
            //
        });
    }
};
