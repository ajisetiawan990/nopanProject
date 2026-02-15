<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    // Form tanggapan
    public function create($id)
    {
        // Ambil pengaduan berdasarkan ID dari route
        $pengaduan = Pengaduan::findOrFail($id);

        return view('petugas.tanggapan', compact('pengaduan'));
    }

    // Simpan tanggapan
    public function store(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string'
        ]);

        // Buat tanggapan baru
        Tanggapan::create([
            'id_pengaduan' => $id,       // Ambil dari route
            'id_user'      => Auth::id(), 
            'tgl_tanggapan'=> now(),
            'tanggapan'    => $request->tanggapan,
        ]);

        // Ubah status pengaduan jadi 'proses' (belum selesai)
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update([
            'status' => 'proses'
        ]);

        return redirect()->route('petugas.dashboard')
                         ->with('success', 'Tanggapan berhasil dikirim');
    }
}
