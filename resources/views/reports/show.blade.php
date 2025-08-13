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

        .dokumen-btn.inline {
            margin-left: 8px;
            margin-top: 0;
            color: #007bff;
            border-color: #007bff;
        }

        .dokumen-btn.inline:hover {
            color: #0056b3;
            border-color: #0056b3;
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
                <hr style="margin-top: 16px; margin-bottom:18px; height:1px; border:none; background-color:grey; width: 98%">
                <!-- Tombol Toggle -->
                <div>
                    <button class="toggle-btn active" id="btn-detail" onclick="showSection('detail')">Detail</button>
                    <button class="toggle-btn" id="btn-dokumen" onclick="showSection('dokumen')">Dokumen</button>
                    <button class="toggle-btn" id="btn-abstrak" onclick="showSection('abstrak')">Abstrak</button>
                    <button class="toggle-btn" id="btn-dokumen-terkait" onclick="showSection('dokumen-terkait')">Dokumen Terkait</button>
                </div>
                <!-- Daftar detail sebagai <li> seperti sebelumnya -->
                <ul id="detail-section" style="list-style: none; padding: 0;">
                    <li style="margin-top: 32px;"><span class="label">Tipe Dokumen</span><span class="colon">:</span><span class="value">{{ $report->tipe_dokumen }}</span></li>
                    <li><span class="label">Jenis</span><span class="colon">:</span><span class="value">{{ $report->jenis }}</span></li>
                    <li><span class="label">Tentang</span><span class="colon">:</span><span class="value">{{ $report->tentang }}</span></li>
                    <li><span class="label">T.E.U</span><span class="colon">:</span><span class="value">{{ $report->teu }}</span></li>
                    <li><span class="label">Nomor</span><span class="colon">:</span><span class="value">{{ $report->nomor }}</span></li>
                    <li><span class="label">Tahun Terbit</span><span class="colon">:</span><span class="value">{{ $report->tahun }}</span></li>
                    <li><span class="label">Tempat Penetapan</span><span class="colon">:</span><span class="value">{{ $report->tempat_terbit }}</span></li>
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
                    @if($report->relatedReports->count() > 0)
                    <li>
                        <span class="label">Dokumen Terkait</span>
                        <span class="colon">:</span>
                        <span class="value">
                            @foreach($report->relatedReports as $relatedReport)
                                <div style="margin-bottom: 5px;">
                                    <a href="{{ route('report.show', $relatedReport->id) }}" style="color: #007bff; text-decoration: none;">
                                        {{ $relatedReport->label }}
                                    </a>
                                    <span style="color: #666; font-size: 0.9em;">
                                        ({{ $relatedReport->tipe_dokumen }} - {{ $relatedReport->nomor ?: 'N/A' }})
                                    </span>
                                </div>
                            @endforeach
                        </span>
                    </li>
                    @endif                    
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

        <!-- Bagian Abstrak -->
        <div id="abstrak-section" class="hidden" style="width:100%; margin: 20px auto">
            @if($report->abstrak)
                <iframe src="{{ asset('storage/' . $report->abstrak) }}#zoom=50" width="75%" height="700px" style="border: 1px solid #ccc; border-radius: 8px;"></iframe>
            @else
                <div style="background: #f9f9f9; padding: 24px; border-radius: 8px; border: 1px solid #e0e0e0; text-align: center; color: #666;">
                    <h3 style="margin-bottom: 16px; color: #333; font-size: 18px;">Abstrak</h3>
                    <p>Abstrak tidak tersedia untuk dokumen ini.</p>
                </div>
            @endif
        </div>

        <!-- Bagian Dokumen Terkait -->
        <div id="dokumen-terkait-section" class="hidden" style="width:100%; margin: 20px auto">
            @if($report->relatedReports->count() > 0)
                <h3 style="margin-bottom: 20px; color: #333; font-size: 18px;">Dokumen Terkait</h3>
                <ul style="list-style: none; padding: 0;">
                    @foreach($report->relatedReports as $relatedReport)
                    <li style="background: #f9f9f9; margin-bottom: 18px; padding: 18px 22px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); position: relative;">
                        <div style="margin-right: 50px;">
                            <div style="margin-bottom: 8px;">
                                <strong>
                                    <a href="{{ route('report.show', $relatedReport->id) }}" style="color: #007bff; text-decoration: none;">
                                        {{ $relatedReport->label }}
                                    </a>
                                </strong>
                                @if($relatedReport->pdf)
                                <a class="dokumen-btn inline" href="{{ asset('storage/' . $relatedReport->pdf) }}" target="_blank">Dokumen</a>
                                @endif
                                <br>
                            </div>
                            <div style="margin-top: 8px; font-size: 0.9em; color: #666;">
                                <span>{{ $relatedReport->tipe_dokumen }}</span>
                                @if($relatedReport->nomor)
                                    <span> - Nomor: {{ $relatedReport->nomor }}</span>
                                @endif
                                @if($relatedReport->tahun_terbit)
                                    <span> - Tahun: {{ $relatedReport->tahun_terbit }}</span>
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('report.show', $relatedReport->id) }}" style="position: absolute; right: 18px; top: 50%; transform: translateY(-50%); background: transparent; border: none; padding: 0; margin: 0; display: flex; align-items: center; cursor: pointer;" aria-label="Lihat detail">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 5l8 7-8 7" stroke="#007bff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </li>
                    @endforeach
                </ul>
            @else
                <div style="background: #f9f9f9; padding: 24px; border-radius: 8px; border: 1px solid #e0e0e0; text-align: center; color: #666;">
                    <h3 style="margin-bottom: 16px; color: #333; font-size: 18px;">Dokumen Terkait</h3>
                    <p>Tidak ada dokumen terkait untuk dokumen ini.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- New -->

    <!-- JavaScript Toggle Logic -->
    <script>
        function showSection(section) {
            const detailSection = document.getElementById('detail-section');
            const dokumenSection = document.getElementById('dokumen-section');
            const abstrakSection = document.getElementById('abstrak-section');
            const dokumenTerkaitSection = document.getElementById('dokumen-terkait-section');
            
            const btnDetail = document.getElementById('btn-detail');
            const btnDokumen = document.getElementById('btn-dokumen');
            const btnAbstrak = document.getElementById('btn-abstrak');
            const btnDokumenTerkait = document.getElementById('btn-dokumen-terkait');

            // Hide all sections
            detailSection.classList.add('hidden');
            dokumenSection.classList.add('hidden');
            abstrakSection.classList.add('hidden');
            dokumenTerkaitSection.classList.add('hidden');
            
            // Remove active class from all buttons
            btnDetail.classList.remove('active');
            btnDokumen.classList.remove('active');
            btnAbstrak.classList.remove('active');
            btnDokumenTerkait.classList.remove('active');

            // Show selected section and activate button
            if (section === 'detail') {
                detailSection.classList.remove('hidden');
                btnDetail.classList.add('active');
            } else if (section === 'dokumen') {
                dokumenSection.classList.remove('hidden');
                btnDokumen.classList.add('active');
            } else if (section === 'abstrak') {
                abstrakSection.classList.remove('hidden');
                btnAbstrak.classList.add('active');
            } else if (section === 'dokumen-terkait') {
                dokumenTerkaitSection.classList.remove('hidden');
                btnDokumenTerkait.classList.add('active');
            }
        }
    </script>
</x-app-layout>