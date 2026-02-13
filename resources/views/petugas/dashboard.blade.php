@extends('layouts.views')

@section('content')

<h2>Dashboard Petugas</h2>
<p>Selamat datang, <b>{{ auth()->user()->name }}</b></p>

<div style="background:#d1ecf1; padding:20px; margin-top:20px;">
    <h4>Menu Petugas</h4>
    <ul>
        <li>Lihat Pengaduan</li>
        <li>Beri Tanggapan</li>
    </ul>
</div>

@endsection
