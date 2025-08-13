<x-app-layout>
    <head>
        <title>
            Keputusan Kepala OPD - Sudah Disetujui
        </title>
        <style>
            .dokumen-btn {
                background: transparent;
                color: #007bff;
                border: 1.5px solid #007bff;
                border-radius: 5px;
                padding: 6px 18px;
                font-size: 0.98rem;
                cursor: pointer;
                font-weight: 500;
                transition: color 0.2s, border-color 0.2s;
                margin-left: 8px;
            }

            .dokumen-btn:hover {
                color: #222;
                border-color: #222;
            }

            .abstrak-btn {
                background: transparent;
                color: #28a745;
                border: 1.5px solid #28a745;
                border-radius: 5px;
                padding: 6px 18px;
                font-size: 0.98rem;
                cursor: pointer;
                font-weight: 500;
                transition: color 0.2s, border-color 0.2s;
                margin-left: 8px;
            }

            .abstrak-btn:hover {
                color: #155724;
                border-color: #155724;
            }

            #searchInput:focus {
                border-color: #007bff;
                box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
            }

            .search-container {
                position: relative;
                display: inline-block;
                width: 60%;
                transition: width 0.3s ease;
            }

            .search-container:focus-within {
                width: 65%;
            }

            .search-icon {
                position: absolute;
                left: 16px;
                top: 50%;
                transform: translateY(-50%);
                width: 20px;
                height: 20px;
                color: #666;
                pointer-events: none;
            }

            .admin-nav {
                background: #fff;
                border-bottom: 1px solid #e5e7eb;
                padding: 0;
                margin-bottom: 20px;
            }

            .admin-nav-container {
                max-width: 1200px;
                margin: 0 auto;
                display: flex;
                justify-content: center;
            }

            .admin-nav-item {
                padding: 16px 24px;
                text-decoration: none;
                color: #6b7280;
                font-weight: 500;
                border-bottom: 2px solid transparent;
                transition: all 0.3s ease;
                position: relative;
            }

            .admin-nav-item:hover {
                color: #007bff;
                background-color: #f8fafc;
            }

            .admin-nav-item.active {
                color: #007bff;
                border-bottom-color: #007bff;
                background-color: #f8fafc;
            }
        </style>
    </head>

    <body>
        <!-- Admin Navigation Bar -->
        <nav class="admin-nav">
            <div class="admin-nav-container">
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-item">Menunggu Persetujuan</a>
                <a href="{{ route('admin.approved') }}" class="admin-nav-item active">Sudah Disetujui</a>
                <a href="{{ route('admin.opd') }}" class="admin-nav-item">OPD</a>
                <a href="{{ route('admin.users') }}" class="admin-nav-item">Daftar OPD</a>
            </div>
        </nav>

        <h1 style="text-align: center; font-size: 24px; margin: 35px 0 0 0; font-weight: bold;">Sudah Disetujui</h1>
        <p style="text-align: center; margin: 25px;">
            {{ $reports->count() }} Dokumen Sudah Disetujui
        </p>

        <!-- Search Bar -->
        <div style="width:70%; margin:0 auto 30px auto; text-align:center;">
            <div class="search-container">
                <svg class="search-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
                <input type="text" id="searchInput" placeholder="Cari dokumen..." autocomplete="off" style="background: #f9f9f9; width: 100%; padding:12px 16px 12px 48px; font-size:16px; border:2px solid #f9f9f9; border-radius:25px; outline:none; box-shadow:0 2px 8px rgba(0,0,0,0.06)">
            </div>
        </div>
        
        <ul style="width:70%; margin:2rem auto; padding:0; list-style:none;" id="reportsList">
            @foreach ($reports as $report)
            <li class="mb-4" style="background: #f9f9f9; margin-bottom:18px; padding:18px 22px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.06); position:relative;">
                <div style="margin-right: 50px;">
                    <div style="margin-bottom: 8px;">
                        <strong>
                            <a href="{{ route('report.show', $report->id) }}">
                                {{ $report->label }}
                            </a>
                        </strong>
                        <a class="dokumen-btn" href="{{ asset('storage/' . $report->pdf) }}" target="_blank">Dokumen</a>
                        @if($report->abstrak && !empty(trim($report->abstrak)))
                            <a class="abstrak-btn" href="{{ asset('storage/' . $report->abstrak) }}" target="_blank">Abstrak</a>
                        @endif
                        <br>
                    </div>
                    <span>{{ $report->tentang }}</span>
                </div>

                <a href="{{ route('report.show', $report->id) }}" style="position:absolute; right:18px; top:50%; transform:translateY(-50%); background:transparent; border:none; padding:0; margin:0; display:flex; align-items:center; cursor:pointer;" aria-label="Lihat detail">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 5l8 7-8 7" stroke="#007bff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </li>
            @endforeach
        </ul>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searchInput');
                const reportsList = document.getElementById('reportsList');
                const allReports = Array.from(reportsList.children);

                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase().trim();

                    allReports.forEach(function(report) {
                        if (report.tagName === 'LI' && report.innerHTML.trim() !== '') {
                            const reportText = report.textContent.toLowerCase();
                            
                            if (searchTerm === '' || reportText.includes(searchTerm)) {
                                report.style.display = 'block';
                            } else {
                                report.style.display = 'none';
                            }
                        }
                    });
                });
            });
        </script>
    </body>

</x-app-layout>
