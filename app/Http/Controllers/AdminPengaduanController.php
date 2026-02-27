<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class AdminPengaduanController extends Controller
{
    // ==============================
    // TAMPILKAN SEMUA PENGADUAN
    // ==============================
    public function index()
    {
        $pengaduan = Pengaduan::all();

        return view('admin.pengaduan.index', compact('pengaduan'));
    }

    // ==============================
    // DETAIL PENGADUAN
    // ==============================
    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    // ==============================
    // UPDATE STATUS
    // ==============================
   public function update($id)
{
    $pengaduan = Pengaduan::findOrFail($id);

    $pengaduan->status = 'diproses';
    $pengaduan->save();

    return redirect()->route('admin.pengaduan.index')
                     ->with('success', 'Status berhasil diperbarui');
}
    // ==============================
// HAPUS PENGADUAN
// ==============================
public function destroy($id)
{
    $pengaduan = Pengaduan::findOrFail($id);

    // optional: hapus file foto jika ada
    if ($pengaduan->foto && file_exists(public_path('uploads/' . $pengaduan->foto))) {
        unlink(public_path('uploads/' . $pengaduan->foto));
    }

    $pengaduan->delete();

    return redirect()->route('admin.pengaduan.index')
                     ->with('success', 'Pengaduan berhasil dihapus');
}
}