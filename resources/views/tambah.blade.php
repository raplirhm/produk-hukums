<x-app-layout>
    <title>
        Tambah Dokumen
    </title>
    
    <h1 style="text-align: center; font-size: 24px; margin: 35px; font-weight: bold;">Tambah Dokumen</h1>

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 12px; margin: 20px auto; max-width: 1000px; border: 1px solid #f5c6cb; border-radius: 4px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 12px; margin: 20px auto; max-width: 1000px; border: 1px solid #c3e6cb; border-radius: 4px;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('report.store') }}" enctype="multipart/form-data" style="max-width:1000px; margin:0 auto; background:#fff; padding:32px 24px 24px 24px; border-radius:10px;">
        @csrf
        <div style="margin-bottom:14px;">
            <label for="tipeDokumen" style="display:block; margin-bottom:6px;">Tipe Dokumen</label>
            <select name="tipe_dokumen" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required>
                <option value="">Pilih Tipe Dokumen</option>
                <option value="Peraturan Perundang-undangan">Peraturan Perundang-undangan</option>
                <option value="Monografi Hukum">Monografi Hukum</option>
                <option value="Artikel Hukum">Artikel Hukum</option>
                <option value="Putusan">Putusan</option>
            </select><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="kategoriProdukHukum" style="display:block; margin-bottom:6px;">Kategori Produk Hukum</label>
            <select name="kategori_produk_hukum" id="kategoriProdukHukum" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required>
                <option value="">Pilih Kategori Produk Hukum</option>
            </select><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="bidanghukum" style="display:block; margin-bottom:6px;">Bidang Hukum</label>
            <select name="bidang_hukum" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required>
                <option value="">Pilih Bidang Hukum</option>
                <option value="Hukum Pidana">Hukum Pidana</option>
                <option value="Hukum Perdata">Hukum Perdata</option>
                <option value="Pajak">Pajak</option>
                <option value="Hukum Acara">Hukum Acara</option>
                <option value="Hukum Adat">Hukum Adat</option>
                <option value="Hukum Administrasi Negara">Hukum Administrasi Negara</option>
                <option value="Hukum Agraria">Hukum Agraria</option>
                <option value="Hukum Dagang">Hukum Dagang</option>
                <option value="Hukum Internasional">Hukum Internasional</option>
                <option value="Hukum Islam">Hukum Islam</option>
                <option value="Sumber Daya Alam">Sumber Daya Alam</option>
                <option value="Transportasi">Transportasi</option>
                <option value="Hukum Lingkungan">Hukum Lingkungan</option>
                <option value="Kesehatan">Kesehatan</option>
                <option value="Keuangan Daerah">Keuangan Daerah</option>
                <option value="Pemerintahan Daerah">Pemerintahan Daerah</option>
                <option value="Kepegawaian">Kepegawaian</option>
                <option value="Partai Politik">Partai Politik</option>
                <option value="Anggaran Pendapatan dan Belanja Daerah">Anggaran Pendapatan dan Belanja Daerah</option>
                <option value="Administrasi Kewilayahan">Administrasi Kewilayahan</option>
                <option value="Tata Kelola Wilayah">Tata Kelola Wilayah</option>
                <option value="Dana Bagi Hasil">Dana Bagi Hasil</option>
                <option value="Standarisasi Biaya">Standarisasi Biaya</option>
                <option value="Dewan Perwakilan Rakyat Daerah (DPRD)">Dewan Perwakilan Rakyat Daerah (DPRD)</option>
                <option value="Perseroan Daerah">Perseroan Daerah</option>
                <option value="Rencana Aksi Daerah">Rencana Aksi Daerah</option>
                <option value="Bencana Alam">Bencana Alam</option>
                <option value="perhubungan">perhubungan</option>
                <option value="Peternakan">Peternakan</option>
                <option value="Pertanian">Pertanian</option>
                <option value="Perindustrian">Perindustrian</option>
                <option value="Ketenagakerjaan">Ketenagakerjaan</option>
                <option value="Pendidikan">Pendidikan</option>
                <option value="Perikanan">Perikanan</option>
                <option value="Pertambangan">Pertambangan</option>
                <option value="Pelayanan Publik">Pelayanan Publik</option>
                <option value="Retribusi">Retribusi</option>
                <option value="DESA">DESA</option>
                <option value="JASA USAHA">JASA USAHA</option>
                <option value="Barang Milik Daerah">Barang Milik Daerah</option>
                <option value="Pariwisata">Pariwisata</option>
                <option value="Hak Asasi Manusia">Hak Asasi Manusia</option>
                <option value="Koperasi">Koperasi</option>
                <option value="Kesehatan Hewan">Kesehatan Hewan</option>
                <option value="PERDAGANGAN">PERDAGANGAN</option>
                <option value="Penyiaran">Penyiaran</option>
                <option value="Perkebunan">Perkebunan</option>
                <option value="USAHA MIKRO, KECIL, DAN MENENGAH">USAHA MIKRO, KECIL, DAN MENENGAH</option>
                <option value="Kependudukan">Kependudukan</option>
                <option value="Pengadaan Barang dan Jasa">Pengadaan Barang dan Jasa</option>
                <option value="Kearsipan">Kearsipan</option>
            </select><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="opd" style="display:block; margin-bottom:6px;">OPD</label>
            <select name="opd" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
                <option value="">Pilih OPD</option>
                <option value="Badan Pengelola Keuangan Dan Aset Daerah Provinsi Jawa Tengah">Badan Pengelola Keuangan Dan Aset Daerah Provinsi Jawa Tengah</option>
                <option value="Dinas Pendidikan Dan Kebudayaan Provinsi Jawa Tengah">Dinas Pendidikan Dan Kebudayaan Provinsi Jawa Tengah</option>
                <option value="Dinas Kepemudaan, Olah Raga Dan Pariwisata Provinsi Jawa Tengah">Dinas Kepemudaan, Olah Raga Dan Pariwisata Provinsi Jawa Tengah</option>
                <option value="Dinas Kearsipan Dan Perpustakaan Provinsi Jawa Tengah">Dinas Kearsipan Dan Perpustakaan Provinsi Jawa Tengah</option>
                <option value="Dinas Kesehatan Provinsi Jawa Tengah">Dinas Kesehatan Provinsi Jawa Tengah</option>
                <option value="Biro Infrastruktur dan Sumber Daya Alam SETDA Provinsi Jawa Tengah">Biro Infrastruktur dan Sumber Daya Alam SETDA Provinsi Jawa Tengah</option>
                <option value="Dinas Perumahan Rakyat Dan Kawasan Permukiman Provinsi Jawa Tengah">Dinas Perumahan Rakyat Dan Kawasan Permukiman Provinsi Jawa Tengah</option>
                <option value="Dinas Pekerjaan Umum Bina Marga Dan Ciptakarya Provinsi Jawa Tengah">Dinas Pekerjaan Umum Bina Marga Dan Ciptakarya Provinsi Jawa Tengah</option>
                <option value="Dinas Pekerjaan Umum Sumber Daya Air Dan Penataan Ruang Provinsi Jawa Tengah">Dinas Pekerjaan Umum Sumber Daya Air Dan Penataan Ruang Provinsi Jawa Tengah</option>
                <option value="Biro Pemerintahan, Otonomi Daerah dan Kerjasama SETDA Provinsi Jawa Tengah">Biro Pemerintahan, Otonomi Daerah dan Kerjasama SETDA Provinsi Jawa Tengah</option>
                <option value="Inspektur Provinsi Jawa Tengah">Inspektur Provinsi Jawa Tengah</option>
                <option value="Dinas Pemberdayaan Masyarakat, Desa, Kependudukan Dan Pencatatan Sipil Provinsi Jawa Tengah">Dinas Pemberdayaan Masyarakat, Desa, Kependudukan Dan Pencatatan Sipil Provinsi Jawa Tengah</option>
                <option value="Badan Penanggulangan Bencana Daerah Provinsi Jawa Tengah">Badan Penanggulangan Bencana Daerah Provinsi Jawa Tengah</option>
                <option value="Dinas Energi Dan Sumber Mineral Provinsi Jawa Tengah">Dinas Energi Dan Sumber Mineral Provinsi Jawa Tengah</option>
                <option value="Dinas Lingkungan Hidup Dan Kehutanan Provinsi Jawa Tengah">Dinas Lingkungan Hidup Dan Kehutanan Provinsi Jawa Tengah</option>
                <option value="Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah">Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah</option>
                <option value="Dinas Penanaman Modal Dan Pelayanan Terpadu Provinsi Jawa Tengah">Dinas Penanaman Modal Dan Pelayanan Terpadu Provinsi Jawa Tengah</option>
                <option value="Biro Perekonomian SETDA Provinsi Jawa Tengah">Biro Perekonomian SETDA Provinsi Jawa Tengah</option>
                <option value="Dinas Koperasi, Usaha Kecil, Dan Menengah Provinsi Jawa Tengah">Dinas Koperasi, Usaha Kecil, Dan Menengah Provinsi Jawa Tengah</option>
                <option value="Dinas Sosial Provinsi Jawa Tengah">Dinas Sosial Provinsi Jawa Tengah</option>
                <option value="Biro Kesejahteraan Rakyat SETDA Provinsi Jawa Tengah">Biro Kesejahteraan Rakyat SETDA Provinsi Jawa Tengah</option>
                <option value="Badan Kesatuan Bangsa, Politik dan Perlindungan Masyarakat Provinsi Jawa Tengah">Badan Kesatuan Bangsa, Politik dan Perlindungan Masyarakat Provinsi Jawa Tengah</option>
                <option value="Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pengendalian Penduduk Dan Keluarga Berencana Provinsi Jawa Tengah">Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pengendalian Penduduk Dan Keluarga Berencana Provinsi Jawa Tengah</option>
                <option value="Badan Pengembangan Sumber Daya Manusia Daerah Provinsi Jawa Tengah">Badan Pengembangan Sumber Daya Manusia Daerah Provinsi Jawa Tengah</option>
                <option value="Badan Kepegawaian Daerah Provinsi Jawa Tengah">Badan Kepegawaian Daerah Provinsi Jawa Tengah</option>
                <option value="Dinas Tenaga Kerja Dan Transmigrasi Provinsi Jawa Tengah">Dinas Tenaga Kerja Dan Transmigrasi Provinsi Jawa Tengah</option>
                <option value="Dinas Komunikasi Dan Informatika Provinsi Jawa Tengah">Dinas Komunikasi Dan Informatika Provinsi Jawa Tengah</option>
                <option value="Sekretaris DPRD Provinsi Jawa Tengah">Sekretaris DPRD Provinsi Jawa Tengah</option>
                <option value="Dinas Perindustrian Dan Perdagangan Provinsi Jawa Tengah">Dinas Perindustrian Dan Perdagangan Provinsi Jawa Tengah</option>
                <option value="Dinas Kelautan Dan Perikanan Provinsi Jawa Tengah">Dinas Kelautan Dan Perikanan Provinsi Jawa Tengah</option>
                <option value="RSJD Dr. Amino Gondohutomo Provinsi Jawa Tengah">RSJD Dr. Amino Gondohutomo Provinsi Jawa Tengah</option>
                <option value="RSJD Dr. RM Soedjarwadi Provinsi Jawa Tengah">RSJD Dr. RM Soedjarwadi Provinsi Jawa Tengah</option>
                <option value="RSJD Surakarta Provinsi Jawa Tengah">RSJD Surakarta Provinsi Jawa Tengah</option>
                <option value="RSUD Dr. Moewardi Provinsi Jawa Tengah">RSUD Dr. Moewardi Provinsi Jawa Tengah</option>
                <option value="RSUD Prof. Dr. Margono Soekarjo Provinsi Jawa Tengah">RSUD Prof. Dr. Margono Soekarjo Provinsi Jawa Tengah</option>
                <option value="RSUD Kelet Provinsi Jawa Tengah">RSUD Kelet Provinsi Jawa Tengah</option>
                <option value="RSUD Tugurejo Provinsi Jawa Tengah">RSUD Tugurejo Provinsi Jawa Tengah</option>
            </select><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="jenisperadilan" style="display:block; margin-bottom:6px;">Jenis Peradilan</label>
            <input name="jenis_peradilan" placeholder="Jenis Peradilan" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="nomor" style="display:block; margin-bottom:6px;">Nomor Peraturan</label>
            <input name="nomor" placeholder="Nomor Peraturan" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="pengarang" style="display:block; margin-bottom:6px;">Pengarang</label>
            <input name="pengarang" placeholder="Pengarang" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
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
            <label for="tahun" style="display:block; margin-bottom:6px;">Tahun</label>
            <input name="tahun" placeholder="Tahun" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="judul" style="display:block; margin-bottom:6px;">Judul</label>
            <input name="judul" placeholder="Judul" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" required><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="tags" style="display:block; margin-bottom:6px;">Tags</label>
            <input name="tags" placeholder="Tags" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="keyword" style="display:block; margin-bottom:6px;">Keyword</label>
            <input name="keyword" placeholder="Keyword" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="abstrak" style="display:block; margin-bottom:6px;">Abstrak (PDF)</label>
            <input type="file" name="abstrak" accept="application/pdf"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="tempatTerbit" style="display:block; margin-bottom:6px;">Tempat Terbit</label>
            <input name="tempat_terbit" placeholder="Tempat Terbit" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="penerbit" style="display:block; margin-bottom:6px;">Penerbit</label>
            <input name="penerbit" placeholder="Penerbit" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="sumber" style="display:block; margin-bottom:6px;">Sumber</label>
            <input name="sumber" placeholder="Sumber" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="pemrakarsa" style="display:block; margin-bottom:6px;">Pemrakarsa</label>
            <input name="pemrakarsa" placeholder="Pemrakarsa" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="penandatangan" style="display:block; margin-bottom:6px;">Penandatangan</label>
            <input name="penandatangan" placeholder="Penandatangan" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="teu" style="display:block; margin-bottom:6px;">T.E.U</label>
            <input name="teu" placeholder="T.E.U" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="isbn" style="display:block; margin-bottom:6px;">ISBN</label>
            <input name="isbn" placeholder="ISBN" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="noPanggil" style="display:block; margin-bottom:6px;">No Panggil</label>
            <input name="no_panggil" placeholder="No Panggil" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="noIndukBuku" style="display:block; margin-bottom:6px;">No Induk Buku</label>
            <input name="no_induk_buku" placeholder="No Induk Buku" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="lokasi" style="display:block; margin-bottom:6px;">Lokasi</label>
            <input name="lokasi" placeholder="Lokasi" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="deskripsiFisik" style="display:block; margin-bottom:6px;">Deskripsi Fisik</label>
            <input name="deskripsi_fisik" placeholder="Deskripsi Fisik" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="hasilujimateri" style="display:block; margin-bottom:6px;">Hasil Uji Materi</label>
            <input name="hasil_uji_materi" placeholder="Hasil Uji Materi" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="keteranganStatus" style="display:block; margin-bottom:6px;">Keterangan Status</label>
            <input name="keterangan_status" placeholder="Keterangan Status" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="author" style="display:block; margin-bottom:6px;">Author</label>
            <input name="author" placeholder="Author" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="pdf" style="display:block; margin-bottom:6px;">Upload PDF</label>
            <input type="file" name="pdf" accept="application/pdf" required><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="dokumenTerkait" style="display:block; margin-bottom:6px;">Dokumen Terkait</label>
            <input type="text" id="searchRelatedReports" placeholder="Cari dokumen terkait..." style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
            <div id="searchResults" style="max-height:200px; overflow-y:auto; border:1px solid #ccc; border-radius:4px; margin-top:5px; display:none;"></div>
            <div id="selectedReports" style="margin-top:10px;"></div>
            <input type="hidden" name="related_reports" id="relatedReportsInput">
        </div>
        <div style="margin-bottom:14px;">
            <label for="lampiran" style="display:block; margin-bottom:6px;">Lampiran (Upload File)</label>
            <input type="file" name="lampiran"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="status" style="display:block; margin-bottom:6px;">Status</label>
            <input name="status" placeholder="Status" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="bahasa" style="display:block; margin-bottom:6px;">Bahasa</label>
            <input name="bahasa" placeholder="Bahasa" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="klasifikasi" style="display:block; margin-bottom:6px;">Klasifikasi</label>
            <input name="klasifikasi" placeholder="Klasifikasi" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>
        <div style="margin-bottom:14px;">
            <label for="fileCover" style="display:block; margin-bottom:6px;">File Cover (Upload png, jpg, jpeg)</label>
            <input type="file" name="file_cover" accept="image/png,image/jpg,image/jpeg"><br>
        </div>

        <button type="submit" class="modal-submit-btn" style="color:#fff; border:none; border-radius:4px; padding:12px 0; font-size:15px; cursor:pointer; width:15%; background:#007bff; margin-top:20px">Kirim</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tipeDokumenSelect = document.querySelector('select[name="tipe_dokumen"]');
            const kategoriSelect = document.getElementById('kategoriProdukHukum');

            // Define options for each tipe dokumen
            const kategoriOptions = {
                'Peraturan Perundang-undangan': [
                    'Peraturan Daerah',
                    'Peraturan Gubernur',
                    'Dokumen Hukum Terjemahan',
                    'Keputusan Gubernur',
                    'Instruksi Gubernur',
                    'Keputusan Sekretaris Daerah',
                    'Peraturan Kepala OPD',
                    'Keputusan Kepala OPD',
                    'Nota Kesepakatan',
                    'Kesepakatan Bersama',
                    'Perjanjian Kerjasama',
                    'Memorandum of Understanding',
                    'Letter of Intent',
                    'Propempergub',
                    'Propemperda',
                    'Dokumen Hukum Langka'
                ],
                'Monografi Hukum': [
                    'Naskah Akademik',
                    'Raperda',
                    'Rapergub',
                    'Hasil Harmonisasi',
                    'Hasil Fasilitasi Raperda Provinsi',
                    'Hasil Fasilitasi Raperda Kabupaten/Kota',
                    'Analisis dan Evaluasi Hukum',
                    'Surat Edaran Gubernur/Wakil Gubernur',
                    'Surat Edaran Sekretaris Daerah',
                    'Surat Edaran Kepala OPD',
                    'RANHAM',
                    'Buku Hukum'
                ],
                'Artikel Hukum': [
                    'Artikel Bidang Hukum'
                ],
                'Putusan': [
                    'Putusan PN',
                    'Putusan PT',
                    'Putusan PTUN',
                    'Putusan PT TUN',
                    'Putusan MA',
                    'Putusan KIP'
                ]
            };

            tipeDokumenSelect.addEventListener('change', function() {
                const selectedTipe = this.value;
                
                // Clear existing options
                kategoriSelect.innerHTML = '<option value="">Pilih Kategori Produk Hukum</option>';
                
                // Add new options based on selected tipe
                if (kategoriOptions[selectedTipe]) {
                    kategoriOptions[selectedTipe].forEach(function(option) {
                        const optionElement = document.createElement('option');
                        optionElement.value = option;
                        optionElement.textContent = option;
                        kategoriSelect.appendChild(optionElement);
                    });
                }
            });

            // Related Reports Search Functionality
            const searchInput = document.getElementById('searchRelatedReports');
            const searchResults = document.getElementById('searchResults');
            const selectedReports = document.getElementById('selectedReports');
            const relatedReportsInput = document.getElementById('relatedReportsInput');
            let selectedReportIds = [];
            let searchTimeout;

            searchInput.addEventListener('input', function() {
                const query = this.value.trim();
                
                clearTimeout(searchTimeout);
                
                if (query.length < 2) {
                    searchResults.style.display = 'none';
                    return;
                }

                searchTimeout = setTimeout(() => {
                    fetch(`/search-reports?query=${encodeURIComponent(query)}`)
                        .then(response => response.json())
                        .then(data => {
                            displaySearchResults(data);
                        })
                        .catch(error => {
                            console.error('Error searching reports:', error);
                        });
                }, 300);
            });

            function displaySearchResults(reports) {
                searchResults.innerHTML = '';
                
                if (reports.length === 0) {
                    searchResults.innerHTML = '<div style="padding:10px; color:#666;">Tidak ada dokumen ditemukan</div>';
                } else {
                    reports.forEach(report => {
                        if (!selectedReportIds.includes(report.id)) {
                            const resultItem = document.createElement('div');
                            resultItem.style.cssText = 'padding:10px; border-bottom:1px solid #eee; cursor:pointer; hover:background-color:#f5f5f5;';
                            resultItem.innerHTML = `
                                <div style="font-weight:bold;">${report.judul}</div>
                                <div style="font-size:0.9em; color:#666;">
                                    ${report.tipe_dokumen} - ${report.jenis} | Nomor: ${report.nomor || 'N/A'} | Tahun: ${report.tahun || 'N/A'}
                                </div>
                            `;
                            
                            resultItem.addEventListener('click', () => {
                                addSelectedReport(report);
                                searchResults.style.display = 'none';
                                searchInput.value = '';
                            });
                            
                            resultItem.addEventListener('mouseenter', () => {
                                resultItem.style.backgroundColor = '#f5f5f5';
                            });
                            
                            resultItem.addEventListener('mouseleave', () => {
                                resultItem.style.backgroundColor = '';
                            });
                            
                            searchResults.appendChild(resultItem);
                        }
                    });
                }
                
                searchResults.style.display = 'block';
            }

            function addSelectedReport(report) {
                selectedReportIds.push(report.id);
                
                const reportTag = document.createElement('div');
                reportTag.style.cssText = 'display:inline-block; background:#007bff; color:white; padding:5px 10px; margin:2px; border-radius:15px; font-size:0.9em;';
                reportTag.innerHTML = `
                    ${report.judul} (${report.nomor || 'N/A'})
                    <span style="margin-left:8px; cursor:pointer; font-weight:bold;" onclick="removeSelectedReport(${report.id}, this.parentElement)">&times;</span>
                `;
                
                selectedReports.appendChild(reportTag);
                updateRelatedReportsInput();
            }

            window.removeSelectedReport = function(reportId, element) {
                selectedReportIds = selectedReportIds.filter(id => id !== reportId);
                element.remove();
                updateRelatedReportsInput();
            };

            function updateRelatedReportsInput() {
                relatedReportsInput.value = selectedReportIds.join(',');
            }

            // Hide search results when clicking outside
            document.addEventListener('click', function(event) {
                if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
                    searchResults.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>