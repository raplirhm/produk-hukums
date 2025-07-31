<x-app-layout>
    <head>
        <title>
            Keputusan Kepala OPD - Daftar OPD
        </title>
        <style>
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
                <a href="{{ route('admin.approved') }}" class="admin-nav-item">Sudah Disetujui</a>
                <a href="{{ route('admin.opd') }}" class="admin-nav-item">OPD</a>
                <a href="{{ route('admin.users') }}" class="admin-nav-item active">Daftar OPD</a>
            </div>
        </nav>

        <h1 style="text-align: center; font-size: 24px; margin: 35px 0 0 0; font-weight: bold;">Daftar OPD</h1>
        <p style="text-align: center; margin: 25px;">
            {{ $users->count() }} Pengguna Terdaftar
        </p>

        <!-- Search Bar -->
        <div style="width:70%; margin:0 auto 30px auto; text-align:center;">
            <div class="search-container">
                <svg class="search-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
                <input type="text" id="searchInput" placeholder="Cari pengguna..." autocomplete="off" style="background: #f9f9f9; width: 100%; padding:12px 16px 12px 48px; font-size:16px; border:2px solid #f9f9f9; border-radius:25px; outline:none; box-shadow:0 2px 8px rgba(0,0,0,0.06)">
            </div>
        </div>
        
        <ul style="width:70%; margin:2rem auto; padding:0; list-style:none;" id="usersList">
            @foreach ($users as $user)
            <li class="mb-4 user-item" style="background: #f9f9f9; margin-bottom:18px; padding:18px 22px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.06); position:relative;">
                <div style="margin-right: 50px;">
                    <div style="margin-bottom: 8px;">
                        <strong style="font-size: 1.1rem; color: #333; word-wrap: break-word; white-space: normal;">
                            {{ $user->name }}
                        </strong>
                        <br>
                    </div>
                    <span style="color: #666; font-size: 0.95rem;">Email : {{ $user->email }}</span>
                </div>
            </li>
            @endforeach
        </ul>

        @if($users->count() == 0)
        <div style="text-align: center; margin: 50px; color: #666; font-size: 1.1rem;">
            Belum ada pengguna terdaftar
        </div>
        @endif

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searchInput');
                const usersList = document.getElementById('usersList');
                const allUsers = Array.from(usersList.querySelectorAll('.user-item'));

                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase().trim();

                allUsers.forEach(function(userItem) {
                    const userName = userItem.querySelector('strong').textContent.toLowerCase();
                    const userEmail = userItem.querySelector('span[style*="color: #666"]').textContent.toLowerCase();
                    
                    if (searchTerm === '' || userName.includes(searchTerm) || userEmail.includes(searchTerm)) {
                        userItem.style.display = 'block';
                    } else {
                        userItem.style.display = 'none';
                    }
                });                    // Update count
                    updateCount();
                });

                function updateCount() {
                    const visibleUsers = allUsers.filter(user => user.style.display !== 'none');
                    const countElement = document.querySelector('h1 + p');
                    countElement.textContent = `${visibleUsers.length} Pengguna Ditampilkan`;
                }
            });
        </script>
    </body>

</x-app-layout>
