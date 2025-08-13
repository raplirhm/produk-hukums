<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


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
        // Log incoming request data for debugging
        Log::info('Form submission data:', $request->all());

        try {
            $request->validate([
                'tipe_dokumen' => 'required',
                'kategori_produk_hukum' => 'required',
                'bidang_hukum' => 'required',
                'tentang' => 'required',
                'pdf' => 'required|mimes:pdf|max:20480',
            ]);

            // Handle file uploads
            $pdfPath = $request->file('pdf')->store('pdfs', 'public');
            $abstrakPath = null;
            if ($request->hasFile('abstrak')) {
                $abstrakPath = $request->file('abstrak')->store('abstraks', 'public');
            }
            // Remove dokumen_terkait file upload - this will be handled as related reports relationship
            $lampiranPath = null;
            if ($request->hasFile('lampiran')) {
                $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
            }
            $fileCoverPath = null;
            if ($request->hasFile('file_cover')) {
                $fileCoverPath = $request->file('file_cover')->store('covers', 'public');
            }

            $report = Report::create([
                'user_id' => Auth::id(),
                'tipe_dokumen' => $request->tipe_dokumen,
                'kategori_produk_hukum' => $request->kategori_produk_hukum,
                'bidang_hukum' => $request->bidang_hukum,
                'opd' => $request->opd,
                'jenis_peradilan' => $request->jenis_peradilan,
                'nomor' => $request->nomor,
                'pengarang' => $request->pengarang,
                'tanggal_penetapan' => $request->tanggal_penetapan,
                'tanggal_pengundangan' => $request->tanggal_pengundangan,
                'tahun' => $request->tahun,
                'tentang' => $request->tentang,
                'tags' => $request->tags,
                'keyword' => $request->keyword,
                'abstrak' => $abstrakPath,
                'tempat_terbit' => $request->tempat_terbit,
                'penerbit' => $request->penerbit,
                'sumber' => $request->sumber ?: Auth::user()->name,
                'pemrakarsa' => $request->pemrakarsa,
                'penandatangan' => $request->penandatangan,
                'teu' => $request->teu,
                'isbn' => $request->isbn,
                'no_panggil' => $request->no_panggil,
                'no_induk_buku' => $request->no_induk_buku,
                'lokasi' => $request->lokasi ?: Auth::user()->name,
                'deskripsi_fisik' => $request->deskripsi_fisik,
                'hasil_uji_materi' => $request->hasil_uji_materi,
                'keterangan_status' => $request->keterangan_status ?: 'Menunggu Persetujuan',
                'author' => $request->author,
                'pdf' => $pdfPath,
                'lampiran' => $lampiranPath,
                'status' => $request->status ?: 'Menunggu',
                'bahasa' => $request->bahasa,
                'klasifikasi' => $request->klasifikasi,
                'file_cover' => $fileCoverPath,
                'jenis' => $request->kategori_produk_hukum ?: 'Keputusan Kepala OPD',
                'label' => ($request->kategori_produk_hukum ?: 'Dokumen') . ' Nomor ' . $request->nomor . ' Tahun ' . $request->tahun,
            ]);
            
            // Handle related reports
            if ($request->has('related_reports') && !empty($request->related_reports)) {
                $relatedReportIds = explode(',', $request->related_reports);
                $relatedReportIds = array_filter(array_map('intval', $relatedReportIds));
                
                if (!empty($relatedReportIds)) {
                    $report->relatedReports()->attach($relatedReportIds);
                }
            }
            
            Log::info('Report created successfully with ID:', ['id' => $report->id]);
            return redirect()->route('dashboard')->with('success', 'Dokumen berhasil diajukan dan menunggu persetujuan.');
            
        } catch (\Exception $e) {
            Log::error('Error creating report:', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan dokumen: ' . $e->getMessage()])->withInput();
        }
    }


    // Admin dashboard (list of pending)
    public function adminDashboard()
    {
        $reports = Report::where('status', 'Menunggu')->get();
        return view('admin', compact('reports'));
    }

    // Admin approved reports page
    public function approvedReports()
    {
        $reports = Report::where('status', 'Berlaku')->get();
        return view('admin.approved', compact('reports'));
    }

    // Admin OPD reports page with user filtering
    public function opdReports()
    {
        $reports = Report::with('user')->where('status', 'Berlaku')->get();
        $users = \App\Models\User::whereHas('reports', function($query) {
            $query->where('status', 'Berlaku');
        })->get();
        return view('admin.opd', compact('reports', 'users'));
    }

    // Admin users list page (Daftar OPD)
    public function usersList()
    {
        $users = \App\Models\User::where('role', '!=', 'admin')->get();
        return view('admin.users', compact('users'));
    }

    public function show($id)
    {
        $report = Report::with('relatedReports')->findOrFail($id);
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

    // Search reports for related documents
    public function searchReports(Request $request)
    {
        $query = $request->get('query', '');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $reports = Report::where('status', 'Berlaku')
            ->where(function($q) use ($query) {
                $q->where('tentang', 'like', '%' . $query . '%')
                  ->orWhere('nomor', 'like', '%' . $query . '%')
                  ->orWhere('tahun', 'like', '%' . $query . '%')
                  ->orWhere('jenis', 'like', '%' . $query . '%')
                  ->orWhere('tipe_dokumen', 'like', '%' . $query . '%');
            })
            ->select('id', 'tentang', 'nomor', 'tahun', 'jenis', 'tipe_dokumen')
            ->limit(10)
            ->get();

        return response()->json($reports);
    }
}
