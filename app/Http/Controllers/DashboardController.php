<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        // Redirect otomatis berdasarkan role
        $role = Auth::user()->role;

        return match ($role) {
            'admin' => redirect()->route('admin.dashboard'),
            'petugas' => redirect()->route('petugas.dashboard'),
            'masyarakat' => redirect()->route('masyarakat.dashboard'),
            default => abort(403),
        };
    }

    public function admin()
    {
        return view('admin.dashboard');
    }

    public function petugas()
    {
        return view('petugas.dashboard');
    }

    public function masyarakat()
    {
        $pengaduan = Pengaduan::where('id_user', Auth::id())
                        ->orderBy('tgl_pengaduan', 'desc')
                        ->get();

        return view('masyarakat.dashboard', compact('pengaduan'));
    }
}
