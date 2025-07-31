<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Detail</title>

    <style>
        li {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .label {
            width: 180px;
            font-weight: bold;
        }

        .colon {
            width: 10px;
        }

        .value {
            flex: 1;
        }

        .detail-list li {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
            align-items: start;
        }

        .detail-list li a {
            color: #007bff;
            text-decoration: none;
        }

        .detail-list li a:hover {
            text-decoration: underline;
        }

        .dokumen-btn {
            background: transparent;
            color: #727272ff;
            border: 1.5px solid #727272ff;
            border-radius: 5px;
            padding: 6px 18px;
            font-size: 0.98rem;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s;
            margin-left: 255px;
            margin-top: 20px;
        }

        .dokumen-btn:hover {
            color: #222;
            border-color: #222;
        }

        .toggle-btn {
            border: 1.5px solid #727272ff;
            border-radius: 5px;
            color: #727272ff;
            transition: all 0.2s;
            font-size: 0.98rem;
            font-weight: 500;
            padding: 8px 24px;
            border-radius: 6px;
            margin-right: 10px;
            cursor: pointer;
        }

        .toggle-btn:hover {
            border: 1.5px solid #007bff;
            color: #007bff;
        }

        .toggle-btn.active {
            background-color: #007bff;
            border: #007bff;
            color: white;
        }

        .hidden {
            display: none;
        }
    </style>

    <button class="dokumen-btn" onclick="window.history.back()">
        <i class="fa fa-arrow-left" style="margin-right: 8px;"></i> Kembali
    </button>

    <!-- New -->

    <!-- Bagian Detail (gunakan div, bukan ul) -->
    <div style="font-size:18px; width:70%; margin:2rem auto;" class="detail-list">
        <div style="display: flex;">
            <div style="flex: 1;">
                <h1 style="font-size: 24px; font-weight: bold;">{{ $report->label }}</h1>
                <span class="value">{{ $report->tentang }}</span>
                <hr style="margin-top: 16px; margin-bottom:18px; height:1px; border:none; background-color:grey; width: 98%">
                <!-- Tombol Toggle -->
                <div>
                    <button class="toggle-btn active" id="btn-detail" onclick="showSection('detail')">Detail</button>
                    <button class="toggle-btn" id="btn-dokumen" onclick="showSection('dokumen')">Dokumen</button>
                </div>
                <!-- Daftar detail sebagai <li> seperti sebelumnya -->
                <ul id="detail-section" style="list-style: none; padding: 0;">
                    <li style="margin-top: 32px;"><span class="label">Tipe Dokumen</span><span class="colon">:</span><span class="value">{{ $report->tipe_dokumen }}</span></li>
                    <li><span class="label">Jenis</span><span class="colon">:</span><span class="value">{{ $report->jenis }}</span></li>
                    <li><span class="label">Judul</span><span class="colon">:</span><span class="value">{{ $report->judul }}</span></li>
                    <li><span class="label">T.E.U</span><span class="colon">:</span><span class="value">{{ $report->teu }}</span></li>
                    <li><span class="label">Nomor</span><span class="colon">:</span><span class="value">{{ $report->nomor }}</span></li>
                    <li><span class="label">Tahun Terbit</span><span class="colon">:</span><span class="value">{{ $report->tahun_terbit }}</span></li>
                    <li><span class="label">Tempat Penetapan</span><span class="colon">:</span><span class="value">{{ $report->tempat_penetapan }}</span></li>
                    <li><span class="label">Tanggal Penetapan</span><span class="colon">:</span><span class="value">{{ $report->tanggal_penetapan }}</span></li>
                    <li><span class="label">Tanggal Pengundangan</span><span class="colon">:</span><span class="value">{{ $report->tanggal_pengundangan }}</span></li>
                    <li><span class="label">Subjek</span><span class="colon">:</span><span class="value">{{ $report->subjek }}</span></li>
                    <li><span class="label">Sumber</span><span class="colon">:</span><span class="value">{{ $report->sumber }}</span></li>
                    <li><span class="label">Status</span><span class="colon">:</span><span class="value">{{ $report->status }}</span></li>
                    <li><span class="label">Keterangan Status</span><span class="colon">:</span><span class="value">{{ $report->keterangan_status }}</span></li>
                    <li><span class="label">Bahasa</span><span class="colon">:</span><span class="value">{{ $report->bahasa }}</span></li>
                    <li><span class="label">Lokasi</span><span class="colon">:</span><span class="value">{{ $report->lokasi }}</span></li>
                    <li><span class="label">Bidang Hukum</span><span class="colon">:</span><span class="value">{{ $report->bidang_hukum }}</span></li>
                    <li><span class="label">Penandatangan</span><span class="colon">:</span><span class="value">{{ $report->penandatangan }}</span></li>
                    <li><span class="label">Hasil Uji Materi</span><span class="colon">:</span><span class="value">{{ $report->hasil_uji_materi }}</span></li>                    
                </ul>
            </div>

            <div style="margin-left: 16px;">
                <div style="text-align:center; background-color:#007bff; width:280px; color:white; padding:16px 24px; border-radius:10px; margin-bottom:16px">
                    <p>Jenis Dokumen</p>
                    <h1 style="font-weight: bold; font-size:20px">{{ $report->jenis }}</h1>
                </div>
                <div style="text-align:center; width:280px; color:black; padding:16px 24px; border-radius:10px">
                    <p>Status</p>
                    <h1 style="font-weight: bold; font-size:22px; color:green">{{ $report->status }}</h1>
                </div>
            </div>
        </div>
        <!-- Bagian Dokumen (PDF Preview) -->
        <div id="dokumen-section" class="hidden" style="width:100%; margin: 20px auto">
            <iframe src="{{ asset('storage/' . $report->pdf) }}#zoom=50" width="75%" height="700px" style="border: 1px solid #ccc; border-radius: 8px;"></iframe>
        </div>
    </div>

    <!-- New -->

    <!-- JavaScript Toggle Logic -->
    <script>
        function showSection(section) {
            const detailSection = document.getElementById('detail-section');
            const dokumenSection = document.getElementById('dokumen-section');
            const btnDetail = document.getElementById('btn-detail');
            const btnDokumen = document.getElementById('btn-dokumen');

            if (section === 'detail') {
                detailSection.classList.remove('hidden');
                dokumenSection.classList.add('hidden');
                btnDetail.classList.add('active');
                btnDokumen.classList.remove('active');
            } else {
                detailSection.classList.add('hidden');
                dokumenSection.classList.remove('hidden');
                btnDetail.classList.remove('active');
                btnDokumen.classList.add('active');
            }
        }
    </script>
</x-app-layout>