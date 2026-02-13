<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'masyarakat']);
    }

    public function create()
    {
        return view('masyarakat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
        ]);

        // simpan data di sini (nanti disesuaikan model)
        
        return redirect()->route('masyarakat.dashboard');
    }
}
