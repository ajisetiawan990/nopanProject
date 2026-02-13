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
        $pengaduan = Pengaduan::where('id_user', Auth::id())
                       ->orderBy('tgl_pengaduan', 'desc')
                       ->get();

    }

    // Form tambah pengaduan
    public function create()
    {
        return view('masyarakat.create');
    }

    // Simpan pengaduan
public function store(Request $request)
{
    if (Auth::user()->role !== 'masyarakat'){
        abort(403);
    }
    $request->validate([
        'isi_laporan' => 'required|string|max:255'
    ]);

    Pengaduan::create([
        'tgl_pengaduan' => now(),
        'id_user' => Auth::id(),
        'isi_laporan' => $request->isi_laporan,
        'status' => 'proses'
    ]);

    return redirect()->route('masyarakat.dashboard');
}

}
