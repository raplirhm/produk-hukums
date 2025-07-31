<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    // User dashboard (only approved reports)
    public function userDashboard()
    {
        $reports = Report::where('status', 'berlaku')->get();
        return view('dashboard', compact('reports'));
    }

    // Form to create a new report
    public function create()
    {
        return view('tambah');
    }

    // Store new report as pending
    public function store(Request $request)
    {
        $request->validate([
            'tipe_dokumen' => 'required',
            'judul' => 'required',
            'teu' => 'required',
            'nomor' => 'required',
            'tahun_terbit' => 'required',
            'tempat_penetapan' => 'required',
            'tanggal_penetapan' => 'required|date',
            'tanggal_pengundangan' => 'required|date',
            'subjek' => 'required',
            'bahasa' => 'required',
            'bidang_hukum' => 'required',
            'penandatangan' => 'required',
            'hasil_uji_materi' => 'required',
            'pdf' => 'required|mimes:pdf|max:20480',
        ]);
        $pdfPath = $request->file('pdf')->store('pdfs', 'public');
        $report = Report::create([
            'user_id' => auth()->id(),
            'tipe_dokumen' => $request->tipe_dokumen,
            'judul' => $request->judul,
            'tentang' => 'Tentang ' . $request->judul,
            'teu' => $request->teu,
            'nomor' => $request->nomor,
            'tahun_terbit' => $request->tahun_terbit,
            'tempat_penetapan' => $request->tempat_penetapan,
            'tanggal_penetapan' => $request->tanggal_penetapan,
            'tanggal_pengundangan' => $request->tanggal_pengundangan,
            'subjek' => $request->subjek,
            'sumber' => auth()->user()->name,
            'status' => 'Menunggu',
            'keterangan_status' => 'Menunggu Persetujuan',
            'bahasa' => $request->bahasa,
            'lokasi' => auth()->user()->name,
            'bidang_hukum' => $request->bidang_hukum,
            'penandatangan' => $request->penandatangan,
            'hasil_uji_materi' => $request->hasil_uji_materi,
            'pdf' => $pdfPath,
            'jenis' => 'Keputusan Kepala OPD', // fixed value
            'label' => 'Keputusan Kepala OPD Nomor ' . $request->nomor . ' Tahun ' . $request->tahun_terbit,
            'status_verifikasi' => 'pending',
        ]);
        return redirect()->route('dashboard')->with('success', 'Dokumen berhasil diajukan dan menunggu persetujuan.');
    }


    // Admin dashboard (list of pending)
    public function adminDashboard()
    {
        $reports = Report::where('status', 'Menunggu')->get();
        return view('admin', compact('reports'));
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('reports.show', compact('report'));
    }

    // Approve a report
    public function approve($id)
    {
        $report = Report::findOrFail($id);
        $report->status = 'Berlaku';
        $report->keterangan_status = 'Berlaku';
        $report->save();
        return redirect()->route('admin.dashboard')->with('success', 'Dokumen berhasil disetujui.');
    }
}
