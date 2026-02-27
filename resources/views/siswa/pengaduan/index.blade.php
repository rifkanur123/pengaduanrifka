<h2>Pengaduan Saya</h2>

<p>
    Login sebagai: <b>{{ session('user_name') }}</b> | 
    <a href="/logout">Logout</a>
</p>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="/siswa/pengaduan/create">+ Buat Pengaduan</a>

<hr>

<table border="1" cellpadding="10" cellspacing="0">
    
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->status }}</td>
            <td>
                @if($item->foto)
                    <img src="{{ asset('uploads/'.$item->foto) }}" width="100">
                @else
                    Tidak ada
                @endif
            </td>
            <td>
                <a href="/siswa/pengaduan/{{ $item->id }}">Detail</a> | 
                
                <a onclick="return confirm('Yakin hapus?')" 
                   href="/siswa/pengaduan/delete/{{ $item->id }}">
                   Hapus
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" align="center">
                Belum ada pengaduan
            </td>
        </tr>
        @endforelse
    </tbody>

</table>