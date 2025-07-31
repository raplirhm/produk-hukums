<x-app-layout>
    <title>
        Tambah Dokumen
    </title>
    
    <h1 style="text-align: center; font-size: 24px; margin: 35px; font-weight: bold;">Tambah Dokumen</h1>

    <form method="POST" action="{{ route('report.store') }}" enctype="multipart/form-data" style="max-width:1000px; margin:0 auto; background:#fff; padding:32px 24px 24px 24px; border-radius:10px;">
        @csrf
        <div style="margin-bottom:14px;">
            <label for="tipeDokumen" style="display:block; margin-bottom:6px;">Tipe Dokumen</label>
            <input name="tipe_dokumen" placeholder="Tipe Dokumen" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="judul" style="display:block; margin-bottom:6px;">Judul</label>
            <input name="judul" placeholder="Judul" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="teu" style="display:block; margin-bottom:6px;">T.E.U</label>
            <input name="teu" placeholder="T.E.U" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="nomor" style="display:block; margin-bottom:6px;">Nomor</label>
            <input name="nomor" placeholder="Nomor" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="tahunterbit" style="display:block; margin-bottom:6px;">Tahun Terbit</label>
            <input name="tahun_terbit" placeholder="Tahun Terbit" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="tempatpenetapan" style="display:block; margin-bottom:6px;">Tempat Penetapan</label>
            <input name="tempat_penetapan" placeholder="Tempat Penetapan" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="tanggalpenetapan" style="display:block; margin-bottom:6px;">Tanggal Penetapan</label>
            <input type="date" id="tanggalPenetapan" name="tanggal_penetapan" style="width:30%; padding:8px; border:1px solid #ccc; border-radius:4px;">
        </div>
        <div style="margin-bottom:14px;">
            <label for="tanggalpenegundangan" style="display:block; margin-bottom:6px;">Tanggal Pengundangan</label>
            <input type="date" id="tanggalPengundangan" name="tanggal_pengundangan" style="width:30%; padding:8px; border:1px solid #ccc; border-radius:4px;">
        </div>
        <div style="margin-bottom:14px;">
            <label for="subjek" style="display:block; margin-bottom:6px;">Subjek</label>
            <input name="subjek" placeholder="Subjek" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required><br>
        </div>
        <!-- <div style="margin-bottom:14px;">
            <label for="sumber" style="display:block; margin-bottom:6px;">Sumber</label>
            <input name="sumber" placeholder="Sumber" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required><br>
        </div> -->
        <div style="margin-bottom:14px;">
            <label for="bahasa" style="display:block; margin-bottom:6px;">Bahasa</label>
            <input name="bahasa" placeholder="Bahasa" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required><br>
        </div>
        <!-- <div style="margin-bottom:14px;">
            <label for="lokasi" style="display:block; margin-bottom:6px;">Lokasi</label>
            <input name="lokasi" placeholder="Lokasi" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required><br>
        </div> -->
        <div style="margin-bottom:14px;">
            <label for="bidanghukum" style="display:block; margin-bottom:6px;">Bidang Hukum</label>
            <input name="bidang_hukum" placeholder="Bidang Hukum" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="penandatangan" style="display:block; margin-bottom:6px;">Penandatangan</label>
            <input name="penandatangan" placeholder="Penandatangan" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="hasilujimateri" style="display:block; margin-bottom:6px;">Hasil Uji Materi</label>
            <input name="hasil_uji_materi" placeholder="Hasil Uji Materi" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required><br>
        </div>

        <label for="pdf">Upload PDF</label>
        <input type="file" name="pdf" accept="application/pdf" required><br>

        <button type="submit" class="modal-submit-btn" style="color:#fff; border:none; border-radius:4px; padding:12px 0; font-size:15px; cursor:pointer; width:15%; background:#007bff; margin-top:20px">Kirim</button>
    </form>
</x-app-layout>