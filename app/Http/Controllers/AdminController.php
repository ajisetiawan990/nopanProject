<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;

class AdminController extends Controller
{
    public function verifikasi($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->update([
            'status' => 'selesai'
        ]);

        return redirect()->route('admin.dashboard')
                         ->with('success', 'Pengaduan berhasil diverifikasi');
    }
}
