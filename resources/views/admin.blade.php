<x-app-layout>
    <head>
        <title>
            Keputusan Kepala OPD
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

            .submit-btn {
                background: transparent;
                color: white;
                background-color: #04d85cff;
                border-radius: 5px;
                padding: 6px 18px;
                font-size: 0.98rem;
                cursor: pointer;
                font-weight: 500;
                transition: color 0.2s, background-color 0.2s;
                margin-top: 8px;
            }

            .submit-btn:hover {
                background-color: #027a34ff;
                border-color: #222;
            }
        </style>
    </head>

    <body>
        <h1 style="text-align: center; font-size: 24px; margin: 35px 0 0 0; font-weight: bold;">Menunggu Persetujuan</h1>
        <p style="text-align: center; margin: 25px;">
            {{ $reports->count() }} Dokumen Menunggu Persetujuan
        </p>

        <ul style="width:70%; margin:2rem auto; padding:0; list-style:none;">
            @foreach ($reports as $report)
            <li class="mb-4" style="background: #f9f9f9; margin-bottom:18px; padding:18px 22px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.06); position:relative;">
                <div style="margin-bottom:8px;">
                    <strong>
                        <a href="{{ route('report.show', $report->id) }}">
                            {{ $report->label }}
                        </a>
                    </strong>
                    <a class="dokumen-btn" href="{{ asset('storage/' . $report->pdf) }}" target="_blank">Dokumen</a>

                </div>
                <span>{{ $report->tentang }}</span>
                <a href="{{ route('report.show', $report->id) }}" style="position:absolute; right:18px; top:50%; transform:translateY(-50%); background:transparent; border:none; padding:0; margin:0; display:flex; align-items:center; cursor:pointer;" aria-label="Lihat detail">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 5l8 7-8 7" stroke="#007bff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>

                <form method="POST" action="{{ route('report.approve', $report->id) }}">
                    @csrf
                    <button type="submit" class="submit-btn">Setujui</button>
                </form>
            </li>
            @endforeach
        </ul>
    </body>

</x-app-layout>