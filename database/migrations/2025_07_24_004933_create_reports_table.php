<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*** Run the migrations.*/
    public function up(): void
{
    Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('tipe_dokumen');
        $table->string('jenis')->default('Keputusan Kepala OPD'); // fixed
        $table->string('judul');
        $table->text('tentang');
        $table->string('teu');
        $table->string('nomor');
        $table->string('tahun_terbit');
        $table->string('tempat_penetapan');
        $table->date('tanggal_penetapan');
        $table->date('tanggal_pengundangan');
        $table->string('subjek');
        $table->string('sumber');
        $table->string('status');
        $table->string('keterangan_status');
        $table->string('bahasa');
        $table->string('lokasi');
        $table->string('bidang_hukum');
        $table->string('penandatangan');
        $table->string('hasil_uji_materi');
        $table->string('label')->nullable(); // auto-generated later
        $table->string('pdf')->nullable(); // PDF file path
        $table->enum('status_verifikasi', ['pending', 'approved'])->default('pending');
        $table->timestamps();
    });
}


    /*** Reverse the migrations.*/
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
