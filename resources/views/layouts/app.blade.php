<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .flex-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            flex-wrap: wrap;
        }
    </style>
</head>

<body class="font-sans antialiased" style="zoom: 0.8;" class="bg-gray-100">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- ✅ Your custom header starts here -->
        <nav
            style="background: linear-gradient(90deg, #007bff 0%, #66b3ff 100%); color: #fff; padding: 3rem; text-align: left; font-size: 1.5rem; font-weight: bold;">
            <a href="/" style="display: inline-block; margin-left:200px">
                <img src="https://jdih.jatengprov.go.id/media/logo.webp" alt="JDIH Provinsi Jawa Tengah Logo"
                    style="height: 60px; vertical-align: middle;">
                <p style="color: white; font-size: 16px; font-weight: lighter; margin-top:20px">Gedung A Lantai 5, Jalan Pahlawan No.9
                    Semarang
                    50243, Jawa Tengah,
                    Indonesia
                    <br> jdih@jatengprov.go.id - (024) 8311282
                </p>
            </a>
        </nav>
        <!-- ✅ Your custom header ends here -->

        <!-- Page Heading
        @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset -->

        <!-- Page Content -->
        <main class="bg-gray-100">
            {{ $slot }}
        </main>
    </div>
    <footer
        style="background: linear-gradient(90deg,rgb(24, 26, 29) 0%,rgb(87, 91, 95) 100%); color: white; text-align: center; padding: 2rem 0; font-size: 1rem; left: 0; bottom: 0; width: 100%; z-index: 100; margin-top:24px">
        <div class="flex-container">
            <div style="margin-bottom: 1rem; margin-right: 8rem; display: flex; align-items: flex-start;">
                <div>
                    <p style="font-weight: bold; font-size: 15px; text-align: justify; text-justify: inter-word;">
                        JARINGAN DOKUMENTASI DAN INFORMASI HUKUM</p>
                    <h1
                        style="font-size: 31px; font-weight: bold; margin-top: 0px; margin-bottom: 10px; text-align: justify; text-justify: inter-word;">
                        PROVINSI JAWA TENGAH</h1>
                    <div style="display: flex; align-items: center;">
                        <img src="https://jdih.jatengprov.go.id/logo/HomeMenu.png" alt="Logo JDIH"
                            style="margin-top: 0px; height: 160px;">
                        <div
                            style="margin-left: 2rem; max-width: 250px; text-align: left; font-size: 15px; font-weight: lighter;">
                            Jaringan Dokumentasi & Informasi Hukum merupakan suatu sistem pendayagunaan bersama
                            peraturan perundang - undangan, dokumentasi hukum lainnya secara tertib, terpadu,
                            berkesinambungan Dan sarana pelayanan informasi hukum secara mudah, cepat dan akurat.
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: left">
                <p style="font-weight: bold;">Alamat</p>
                <p>Gedung A Lantai 5, Jalan Pahlawan No.9 Semarang <br> 50243, Jawa Tengah, Indonesia<br></p>
                <div style="margin-bottom: 1rem; margin-top:20px ">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.646964893624!2d110.420225!3d-6.993856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b5e2e2e2e2f%3A0x2e2e2e2e2e2e2e2e!2sJl.+Pahlawan+No.9+Lantai+5+Mugassari+Kec.+Semarang+Sel.+Kota+Semarang,+Jawa+Tengah+50249!5e0!3m2!1sid!2sid!4v1721568000000!5m2!1sid!2sid"
                        width="300" height="150" style="border:0; border-radius:8px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <p style="font-weight: bold;">Media Sosial</p>
                <div style="display: flex; flex-direction: row; align-items: center; gap: 12px; margin-bottom: 1rem;">
                    <a href="https://www.youtube.com/channel/UCFFZo4PAotie8YCr49chvqg" target="_blank" style="color:#fff;">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/youtube.svg" alt="YouTube"
                            style="height:24px; width:24px; vertical-align:middle; filter:invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
                    </a>
                    <a href="https://www.facebook.com/jdihprovjateng" target="_blank" style="color:#fff;">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" alt="Facebook"
                            style="height:24px; width:24px; vertical-align:middle; filter:invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
                    </a>
                    <a href="https://www.instagram.com/jdihprovjateng/" target="_blank" style="color:#fff;">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" alt="Instagram"
                            style="height:24px; width:24px; vertical-align:middle; filter:invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
                    </a>
                    <a href="https://twitter.com/jdihprovjateng" target="_blank" style="color:#fff;">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/twitter.svg" alt="Twitter"
                            style="height:24px; width:24px; vertical-align:middle; filter:invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=6289502281199&text=Saya%20ingin%20bertanya%20mengenai%20layanan%20JDIH%20Provinsi%20Jawa%20Tengah."
                        target="_blank" style="color:#fff;">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/whatsapp.svg" alt="WhatsApp"
                            style="height:24px; width:24px; vertical-align:middle; filter:invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
                    </a>
                    <a href="https://play.google.com/store/apps/details?id=com.jdih.jdih_jateng_mobile_android_v_101"
                        target="_blank" style="color:#fff;">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/googleplay.svg" alt="Google Play Store"
                            style="height:24px; width:24px; vertical-align:middle; filter:invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
                    </a>
                </div>
            </div>
        </div>
        <div style="margin-top: 3rem;">
            Hak Cipta 2022© Biro Hukum Pemerintah Provinsi Jawa Tengah
        </div>
    </footer>

    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#04d85c',
            timer: 2500,
            timerProgressBar: true,
            showConfirmButton: false
        });
    </script>
    @endif

</body>

</html>