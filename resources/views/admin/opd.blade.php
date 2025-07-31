<x-app-layout>
    <head>
        <title>
            Keputusan Kepala OPD - OPD
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

            .filter-container {
                display: flex;
                gap: 15px;
                align-items: center;
                justify-content: center;
                margin-bottom: 20px;
            }

            .user-filter {
                padding: 10px 16px;
                border: 2px solid #f9f9f9;
                border-radius: 20px;
                background: transparent;
                font-size: 16px;
                outline: none;
                transition: border-color 0.3s ease;
                min-width: 200px;
            }

            .user-filter:focus {
                border-color: #f9f9f9;
                box-shadow: none;
            }

            /* Custom Dropdown Styling */
            .custom-dropdown {
                position: relative;
                display: inline-block;
                min-width: 200px;
            }

            .dropdown-selected {
                padding: 10px 16px;
                border: 2px solid #f9f9f9;
                border-radius: 25px;
                background: #f9f9f9;
                font-size: 16px;
                cursor: pointer;
                display: flex;
                justify-content: space-between;
                align-items: center;
                min-width: 200px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            }

            .dropdown-selected:focus {
                outline: none;
                box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
            }

            .dropdown-arrow {
                transition: transform 0.3s ease;
                margin-left: 8px;
            }

            .dropdown-arrow.open {
                transform: rotate(180deg);
            }

            .dropdown-options {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                border: 1px solid #e5e7eb;
                border-radius: 25px;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                z-index: 1000;
                max-height: 200px;
                overflow-y: auto;
                margin-top: 16px;
                opacity: 0;
                transform: translateY(-10px);
                transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s ease;
                visibility: hidden;
                pointer-events: none;
            }

            .dropdown-options.show {
                opacity: 1;
                transform: translateY(0);
                visibility: visible;
                pointer-events: auto;
            }

            .dropdown-option {
                padding: 10px 16px;
                cursor: pointer;
                transition: background-color 0.3s ease, color 0.3s ease;
            }

            .dropdown-option:hover {
                background-color: #007bff;
                color: white;
            }

            .dropdown-option:first-child {
                border-top-left-radius: 25px;
                border-top-right-radius: 25px;
            }

            .dropdown-option:last-child {
                border-bottom-left-radius: 25px;
                border-bottom-right-radius: 25px;
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

            .user-info {
                font-size: 0.9rem;
                color: #666;
                margin-top: 4px;
            }
        </style>
    </head>

    <body>
        <!-- Admin Navigation Bar -->
        <nav class="admin-nav">
            <div class="admin-nav-container">
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-item">Menunggu Persetujuan</a>
                <a href="{{ route('admin.approved') }}" class="admin-nav-item">Sudah Disetujui</a>
                <a href="{{ route('admin.opd') }}" class="admin-nav-item active">OPD</a>
                <a href="{{ route('admin.users') }}" class="admin-nav-item">Daftar OPD</a>
            </div>
        </nav>

        <h1 style="text-align: center; font-size: 24px; margin: 35px 0 0 0; font-weight: bold;">Dokumen OPD</h1>
        <p style="text-align: center; margin: 25px;">
            {{ $reports->count() }} Dokumen Total
        </p>

        <!-- Enhanced Search Bar with User Filter -->
        <div style="width:70%; margin:0 auto 30px auto;">
            <!-- Search Bar -->
            <div class="filter-container">
                <div class="search-container">
                    <svg class="search-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                    <input type="text" id="searchInput" placeholder="Cari dokumen..." autocomplete="off" style="background: #f9f9f9; width: 100%; padding:12px 16px 12px 48px; font-size:16px; border:2px solid #f9f9f9; border-radius:25px; outline:none; box-shadow:0 2px 8px rgba(0,0,0,0.06)">
                </div>
                
                <!-- Custom User Filter Dropdown -->
                <div class="custom-dropdown">
                    <div class="dropdown-selected" id="dropdownSelected" tabindex="0">
                        <span id="selectedText" >Semua OPD</span>
                        <svg class="dropdown-arrow" id="dropdownArrow" width="12" height="12" viewBox="0 0 24 24" fill="none">
                            <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="dropdown-options" id="dropdownOptions">
                        <div class="dropdown-option selected" data-value="">Semua OPD</div>
                        @foreach ($users as $user)
                            <div class="dropdown-option" data-value="{{ $user->id }}">{{ $user->name }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <ul style="width:70%; margin:2rem auto; padding:0; list-style:none;" id="reportsList">
            @foreach ($reports as $report)
            <li class="mb-4 report-item" data-user-id="{{ $report->user_id }}" style="background: #f9f9f9; margin-bottom:18px; padding:18px 22px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.06); position:relative;">
                <div style="margin-right: 50px;">
                    <div style="margin-bottom: 8px;">
                        <strong>
                            <a href="{{ route('report.show', $report->id) }}">
                                {{ $report->label }}
                            </a>
                        </strong>
                        <a class="dokumen-btn" href="{{ asset('storage/' . $report->pdf) }}" target="_blank">Dokumen</a>
                        <br>
                    </div>
                    <span>{{ $report->judul }}</span>
                    <div class="user-info">
                        Dibuat oleh: {{ $report->user->name ?? 'Unknown' }}
                    </div>
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
                const allReports = Array.from(reportsList.querySelectorAll('.report-item'));
                
                // Custom dropdown functionality
                const dropdownSelected = document.getElementById('dropdownSelected');
                const dropdownOptions = document.getElementById('dropdownOptions');
                const dropdownArrow = document.getElementById('dropdownArrow');
                const selectedText = document.getElementById('selectedText');
                let selectedUserId = '';

                // Toggle dropdown
                dropdownSelected.addEventListener('click', function() {
                    dropdownOptions.classList.toggle('show');
                    dropdownArrow.classList.toggle('open');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!event.target.closest('.custom-dropdown')) {
                        dropdownOptions.classList.remove('show');
                        dropdownArrow.classList.remove('open');
                    }
                });

                // Handle option selection
                dropdownOptions.addEventListener('click', function(event) {
                    if (event.target.classList.contains('dropdown-option')) {
                        // Remove selected class from all options
                        dropdownOptions.querySelectorAll('.dropdown-option').forEach(option => {
                            option.classList.remove('selected');
                        });
                        
                        // Add selected class to clicked option
                        event.target.classList.add('selected');
                        
                        // Update selected text and value
                        selectedText.textContent = event.target.textContent;
                        selectedUserId = event.target.getAttribute('data-value');
                        
                        // Close dropdown
                        dropdownOptions.classList.remove('show');
                        dropdownArrow.classList.remove('open');
                        
                        // Filter reports
                        filterReports();
                    }
                });

                function filterReports() {
                    const searchTerm = searchInput.value.toLowerCase().trim();

                    allReports.forEach(function(report) {
                        const reportText = report.textContent.toLowerCase();
                        const reportUserId = report.getAttribute('data-user-id');
                        
                        // Check search term match
                        const matchesSearch = searchTerm === '' || reportText.includes(searchTerm);
                        
                        // Check user filter match
                        const matchesUser = selectedUserId === '' || reportUserId === selectedUserId;
                        
                        // Show report only if it matches both filters
                        if (matchesSearch && matchesUser) {
                            report.style.display = 'block';
                        } else {
                            report.style.display = 'none';
                        }
                    });

                    // Update count
                    updateCount();
                }

                function updateCount() {
                    const visibleReports = allReports.filter(report => report.style.display !== 'none');
                    const countElement = document.querySelector('h1 + p');
                    countElement.textContent = `${visibleReports.length} Dokumen Ditampilkan`;
                }

                // Add event listeners
                searchInput.addEventListener('input', filterReports);
            });
        </script>
    </body>

</x-app-layout>
