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
            // Add columns that are missing from previous migrations
            if (!Schema::hasColumn('reports', 'kategori_produk_hukum')) {
                $table->string('kategori_produk_hukum')->nullable();
            }
            if (!Schema::hasColumn('reports', 'jenis_peradilan')) {
                $table->string('jenis_peradilan')->nullable();
            }
            if (!Schema::hasColumn('reports', 'pengarang')) {
                $table->string('pengarang')->nullable();
            }
            if (!Schema::hasColumn('reports', 'tahun')) {
                $table->string('tahun')->nullable();
            }
            if (!Schema::hasColumn('reports', 'tags')) {
                $table->string('tags')->nullable();
            }
            if (!Schema::hasColumn('reports', 'keyword')) {
                $table->string('keyword')->nullable();
            }
            if (!Schema::hasColumn('reports', 'abstrak')) {
                $table->string('abstrak')->nullable();
            }
            if (!Schema::hasColumn('reports', 'tempat_terbit')) {
                $table->string('tempat_terbit')->nullable();
            }
            if (!Schema::hasColumn('reports', 'penerbit')) {
                $table->string('penerbit')->nullable();
            }
            if (!Schema::hasColumn('reports', 'pemrakarsa')) {
                $table->string('pemrakarsa')->nullable();
            }
            if (!Schema::hasColumn('reports', 'isbn')) {
                $table->string('isbn')->nullable();
            }
            if (!Schema::hasColumn('reports', 'no_panggil')) {
                $table->string('no_panggil')->nullable();
            }
            if (!Schema::hasColumn('reports', 'no_induk_buku')) {
                $table->string('no_induk_buku')->nullable();
            }
            if (!Schema::hasColumn('reports', 'deskripsi_fisik')) {
                $table->string('deskripsi_fisik')->nullable();
            }
            if (!Schema::hasColumn('reports', 'author')) {
                $table->string('author')->nullable();
            }
            if (!Schema::hasColumn('reports', 'dokumen_terkait')) {
                $table->string('dokumen_terkait')->nullable();
            }
            if (!Schema::hasColumn('reports', 'lampiran')) {
                $table->string('lampiran')->nullable();
            }
            if (!Schema::hasColumn('reports', 'klasifikasi')) {
                $table->string('klasifikasi')->nullable();
            }
            if (!Schema::hasColumn('reports', 'file_cover')) {
                $table->string('file_cover')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn([
                'kategori_produk_hukum',
                'jenis_peradilan',
                'pengarang',
                'tahun',
                'tags',
                'keyword',
                'abstrak',
                'tempat_terbit',
                'penerbit',
                'pemrakarsa',
                'isbn',
                'no_panggil',
                'no_induk_buku',
                'deskripsi_fisik',
                'author',
                'dokumen_terkait',
                'lampiran',
                'klasifikasi',
                'file_cover'
            ]);
        });
    }
};
