<h2>Admin - Detail Pengaduan</h2>
<a href="/admin/pengaduan">Kembali</a>
<hr>

@if(session('success'))
<p style="color:green">{{ session('success') }}</p>
@endif

<p><b>Nama Siswa:</b> {{ $pengaduan->user->name }}</p>
<p><b>Judul:</b> {{ $pengaduan->judul }}</p>
<p><b>Status:</b> {{ $pengaduan->status }}</p>
<p><b>Deskripsi:</b> {{ $pengaduan->deskripsi }}</p>

@if($pengaduan->foto)
    <img src="{{ asset('uploads/'.$pengaduan->foto) }}" width="250">
@endif

<hr>

<form method="POST" action="/admin/pengaduan/update/{{ $pengaduan->id }}">
    @csrf

    <label>Status</label><br>
    <select name="status">
        <option value="menunggu" {{ $pengaduan->status=='menunggu'?'selected':'' }}>Menunggu</option>
        <option value="diproses" {{ $pengaduan->status=='diproses'?'selected':'' }}>Diproses</option>
        <option value="selesai" {{ $pengaduan->status=='selesai'?'selected':'' }}>Selesai</option>
        <option value="ditolak" {{ $pengaduan->status=='ditolak'?'selected':'' }}>Ditolak</option>
    </select>

    <br><br>

    <label>Tanggapan Admin</label><br>
    <textarea name="tanggapan_admin">{{ $pengaduan->tanggapan_admin }}</textarea>

    <br><br>
    <button type="submit">Simpan</button>
</form>

