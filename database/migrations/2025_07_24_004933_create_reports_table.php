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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Basic document information
            $table->string('tipe_dokumen');
            $table->string('jenis')->default('Keputusan Kepala OPD');
            $table->string('judul');
            $table->text('tentang');
            $table->string('label')->nullable();
            
            // Document details - making most nullable for flexibility
            $table->string('teu')->nullable();
            $table->string('nomor')->nullable();
            $table->string('nomor_peraturan')->nullable();
            $table->string('tahun_terbit')->nullable();
            $table->string('tahun')->nullable();
            $table->string('tempat_penetapan')->nullable();
            $table->string('tempat_terbit')->nullable();
            $table->date('tanggal_penetapan')->nullable();
            $table->date('tanggal_pengundangan')->nullable();
            
            // Classification and metadata
            $table->string('subjek')->nullable();
            $table->string('sumber')->nullable();
            $table->string('status')->nullable();
            $table->string('keterangan_status')->nullable();
            $table->string('bahasa')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('bidang_hukum')->nullable();
            $table->string('opd')->nullable();
            $table->string('penandatangan')->nullable();
            $table->string('hasil_uji_materi')->nullable();
            
            // Additional metadata fields
            $table->string('kategori_produk_hukum')->nullable();
            $table->string('jenis_peradilan')->nullable();
            $table->string('pengarang')->nullable();
            $table->string('author')->nullable();
            $table->string('tags')->nullable();
            $table->string('keyword')->nullable();
            $table->text('abstrak')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('pemrakarsa')->nullable();
            $table->string('isbn')->nullable();
            $table->string('no_panggil')->nullable();
            $table->string('no_induk_buku')->nullable();
            $table->string('deskripsi_fisik')->nullable();
            $table->string('dokumen_terkait')->nullable();
            $table->string('lampiran')->nullable();
            $table->string('klasifikasi')->nullable();
            
            // File attachments
            $table->string('pdf')->nullable();
            $table->string('file_cover')->nullable();
            
            // Status
            $table->enum('status_verifikasi', ['pending', 'approved'])->default('pending');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
