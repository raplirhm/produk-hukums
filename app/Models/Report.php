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
        'judul',
        'tentang',
        'teu',
        'nomor',
        'tahun_terbit',
        'tempat_penetapan',
        'tanggal_penetapan',
        'tanggal_pengundangan',
        'subjek',
        'sumber',
        'status',
        'keterangan_status',
        'bahasa',
        'lokasi',
        'bidang_hukum',
        'penandatangan',
        'hasil_uji_materi',
        'pdf',
        'label',
        'jenis',
        'status_verifikasi',
    ];
}
