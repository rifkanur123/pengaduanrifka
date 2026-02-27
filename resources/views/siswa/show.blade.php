<h2>Detail Pengaduan</h2>
<a href="/siswa/pengaduan">Kembali</a>
<hr>

<p><b>Judul:</b> {{ $pengaduan->judul }}</p>
<p><b>Kategori:</b> {{ $pengaduan->kategori }}</p>
<p><b>Lokasi:</b> {{ $pengaduan->lokasi }}</p>
<p><b>Deskripsi:</b> {{ $pengaduan->deskripsi }}</p>
<p><b>Status:</b> {{ $pengaduan->status }}</p>
<p><b>Tanggapan Admin:</b> {{ $pengaduan->tanggapan_admin ?? '-' }}</p>

@if($pengaduan->foto)
    <img src="{{ asset('uploads/'.$pengaduan->foto) }}" width="250">
@else
    <p>Tidak ada foto</p>
@endif
