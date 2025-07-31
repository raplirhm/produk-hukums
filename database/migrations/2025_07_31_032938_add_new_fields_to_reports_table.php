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
        Schema::table('reports', function (Blueprint $table) {
            // Make existing fields nullable
            $table->string('nomor')->nullable()->change();
            $table->string('teu')->nullable()->change();
            $table->date('tanggal_penetapan')->nullable()->change();
            $table->date('tanggal_pengundangan')->nullable()->change();
            $table->string('tahun')->nullable()->change();
            $table->string('sumber')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->string('keterangan_status')->nullable()->change();
            $table->string('bahasa')->nullable()->change();
            $table->string('lokasi')->nullable()->change();
            $table->string('bidang_hukum')->nullable()->change();
            $table->string('opd')->nullable()->change();
            $table->string('nomor_peraturan')->nullable()->change();
            $table->string('penandatangan')->nullable()->change();
            $table->string('hasil_uji_materi')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            // Restore original field requirements for the fields we changed
            $table->string('nomor')->nullable(false)->change();
            $table->string('teu')->nullable(false)->change();
            $table->date('tanggal_penetapan')->nullable(false)->change();
            $table->date('tanggal_pengundangan')->nullable(false)->change();
            $table->string('tahun')->nullable(false)->change();
            $table->string('sumber')->nullable(false)->change();
            $table->string('status')->nullable(false)->change();
            $table->string('keterangan_status')->nullable(false)->change();
            $table->string('bahasa')->nullable(false)->change();
            $table->string('lokasi')->nullable(false)->change();
            $table->string('bidang_hukum')->nullable(false)->change();
            $table->string('opd')->nullable(false)->change();
            $table->string('nomor_peraturan')->nullable(false)->change();
            $table->string('penandatangan')->nullable(false)->change();
            $table->string('hasil_uji_materi')->nullable(false)->change();
        });
    }
};
