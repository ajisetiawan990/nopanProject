@extends('layouts.views')

@section('content')

<h2>Dashboard Admin</h2>
<p>Selamat datang, <b>{{ auth()->user()->name }}</b></p>

<div style="background:#f8d7da; padding:20px; margin-top:20px;">
    <h4>Menu Admin</h4>
    <ul>
        <li>Kelola User</li>
        <li>Lihat Semua Data</li>
    </ul>
</div>

@endsection
