@extends('layouts.app')

@section('content')

<style>
    body {
        background: #f9fafc;
        font-family: 'Segoe UI', sans-serif;
    }

    .container-admin {
        max-width: 1200px;
        margin: 40px auto;
    }

    .header-admin {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .header-admin h2 {
        font-weight: 700;
        color: #e91e63;
    }

    .logout-link {
        color: #e91e63;
        font-weight: 600;
        text-decoration: none;
    }

    .logout-link:hover {
        text-decoration: underline;
    }

    .card-box {
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.05);
    }

    .stats {
        display: flex;
        gap: 20px;
        margin-bottom: 25px;
    }

    .stat-card {
        flex: 1;
        background: linear-gradient(45deg, #ff9eb5, #ff6fa5);
        color: white;
        padding: 20px;
        border-radius: 15px;
        text-align: center;
        font-weight: 600;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #fce4ec;
        padding: 12px;
        text-align: center;
        font-size: 14px;
    }

    td {
        padding: 12px;
        text-align: center;
        font-size: 14px;
        border-bottom: 1px solid #f1f1f1;
    }

    tr:hover {
        background: #fafafa;
    }

    .badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        color: white;
    }

    .diproses { background: #2196f3; }
    .selesai { background: #4caf50; }
    .menunggu { background: #ff9800; }

    .btn {
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 12px;
        border: none;
        cursor: pointer;
        font-weight: 600;
    }

    .btn-detail {
        background: #03a9f4;
        color: white;
    }

    .btn-proses {
        background: #4caf50;
        color: white;
    }

    .btn-hapus {
        background: #f44336;
        color: white;
    }

    .btn:hover {
        opacity: 0.85;
    }

    .img-preview {
        width: 70px;
        border-radius: 8px;
    }

</style>

<div class="container-admin">

    <div class="header-admin">
        <h2>📋 Dashboard Admin - Pengaduan</h2>
        <a href="{{ route('logout') }}" class="logout-link">Logout</a>
    </div>

    {{-- Statistik --}}
    <div class="stats">
        <div class="stat-card">
            Total<br>
            {{ $pengaduan->count() }}
        </div>
        <div class="stat-card" style="background:linear-gradient(45deg,#2196f3,#1976d2)">
            Diproses<br>
            {{ $pengaduan->where('status','diproses')->count() }}
        </div>
        <div class="stat-card" style="background:linear-gradient(45deg,#4caf50,#2e7d32)">
            Selesai<br>
            {{ $pengaduan->where('status','selesai')->count() }}
        </div>
    </div>

    <div class="card-box">

        @if(session('success'))
            <div style="background:#e8f5e9;padding:10px;border-radius:8px;margin-bottom:15px;color:#2e7d32;">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Foto</th>
                    <th>Aksi</th>

                </tr>
            </thead>

            <tbody>
                @forelse($pengaduan as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->user->name ?? '-' }}</td>
                    <td>{{ $p->judul }}</td>
                    <td>
                        {{ $p->created_at->translatedFormat('d F Y') }}                    </td>
                    <td>
                        @if($p->status == 'diproses')
                            <span class="badge diproses">Diproses</span>
                        @elseif($p->status == 'selesai')
                            <span class="badge selesai">Selesai</span>
                        @else
                            <span class="badge menunggu">Menunggu</span>
                        @endif
                    </td>

                    <td>
                        @if($p->foto)
                            <img src="{{ asset('uploads/'.$p->foto) }}" class="img-preview">
                        @else
                            -
                        @endif
                    </td>

                    <td>

                        <a href="{{ route('admin.pengaduan.show',$p->id) }}">
                            <button class="btn btn-detail">Detail</button>
                        </a>

                        <form action="{{ route('admin.pengaduan.update',$p->id) }}" 
                              method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-proses">Proses</button>
                        </form>

                        <form action="{{ route('admin.pengaduan.destroy',$p->id) }}" 
                              method="POST" 
                              style="display:inline;"
                              onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-hapus">Hapus</button>
                        </form>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">Belum ada pengaduan</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</div>

@endsection