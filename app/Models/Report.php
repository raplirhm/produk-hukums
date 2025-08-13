<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipe_dokumen',
        'kategori_produk_hukum',
        'bidang_hukum',
        'opd',
        'jenis_peradilan',
        'nomor',
        'pengarang',
        'tanggal_penetapan',
        'tanggal_pengundangan',
        'tahun',
        'tentang',
        'tags',
        'keyword',
        'abstrak',
        'tempat_terbit',
        'penerbit',
        'sumber',
        'pemrakarsa',
        'penandatangan',
        'teu',
        'isbn',
        'no_panggil',
        'no_induk_buku',
        'lokasi',
        'deskripsi_fisik',
        'hasil_uji_materi',
        'keterangan_status',
        'author',
        'pdf',
        'lampiran',
        'status',
        'bahasa',
        'klasifikasi',
        'file_cover',
        'label',
        'jenis',
        'status_verifikasi',
    ];

    /**
     * Get the user that owns the report.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with related reports
    public function relatedReports()
    {
        return $this->belongsToMany(Report::class, 'report_relationships', 'report_id', 'related_report_id');
    }

    // Reverse relationship (reports that have this report as related)
    public function reportsRelatedTo()
    {
        return $this->belongsToMany(Report::class, 'report_relationships', 'related_report_id', 'report_id');
    }
}
