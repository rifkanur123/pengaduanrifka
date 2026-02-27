@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-pink text-white">
            <h5 class="mb-0">Buat Pengaduan Baru</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('siswa.pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto (Opsional)</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <button type="submit" class="btn btn-pink">
                    Kirim Pengaduan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection