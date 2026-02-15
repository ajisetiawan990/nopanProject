<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        return match ($role) {
            'admin' => redirect()->route('admin.dashboard'),
            'petugas' => redirect()->route('petugas.dashboard'),
            'masyarakat' => redirect()->route('masyarakat.dashboard'),
            default => abort(403),
        };
    }

    // ✅ ADMIN
    public function admin()
    {
        $pengaduan = Pengaduan::with('tanggapan')->get();

        return view('admin.dashboard', compact('pengaduan'));
    }

    // ✅ PETUGAS
    public function petugas()
    {
        $pengaduan = Pengaduan::with('tanggapan')->get();

        return view('petugas.dashboard', compact('pengaduan'));
    }

    // ✅ MASYARAKAT
    public function masyarakat()
    {
        $pengaduan = Pengaduan::with('tanggapan')
            ->where('id_user', Auth::id()) // supaya hanya lihat miliknya
            ->get();

        return view('masyarakat.dashboard', compact('pengaduan'));
    }
}
