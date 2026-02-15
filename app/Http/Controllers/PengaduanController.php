<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{

    // Tampilkan daftar pengaduan milik user
    public function index()
    {
        $pengaduan = Pengaduan::get();

        return view('masyarakat.dashboard', compact('pengaduan'));
    }

    // Form tambah pengaduan
    public function create()
    {
        return view('masyarakat.create');
    }

    // Simpan pengaduan
    public function store(Request $request)
    {
        $request->validate([
            'isi_laporan' => 'required|string'
        ]);

        Pengaduan::create([
            'tgl_pengaduan' => now(),
            'id_user'       => Auth::id(), // 🔥 WAJIB ADA
            'isi_laporan'   => $request->isi_laporan,
            'status'        => 'proses'
        ]);

        return redirect()
            ->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dikirim');
    }
}
