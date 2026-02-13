<!DOCTYPE html>
<html>
<head>
    <title>Multi Role Laravel 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-3 d-flex justify-content-between">
    <span class="navbar-brand">Sistem Multi Role</span>

    @auth
        <div class="d-flex align-items-center gap-3">
            <span class="text-white">
                {{ auth()->user()->name }} ({{ auth()->user()->role }})
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">
                    Logout
                </button>
            </form>
        </div>
    @endauth
</nav>


<div class="container mt-4">

    {{-- Alert --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Menu Berdasarkan Role --}}
    @auth
        <div class="mb-3">
            @if(auth()->user()->role == 'admin')
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Dashboard Admin</a>
            @elseif(auth()->user()->role == 'petugas')
                <a href="{{ route('petugas.dashboard') }}" class="btn btn-success">Dashboard Petugas</a>
            @elseif(auth()->user()->role == 'masyarakat')
                <a href="{{ route('masyarakat.dashboard') }}" class="btn btn-warning">Dashboard Masyarakat</a>
            @endif
        </div>
    @endauth

    {{-- Isi Konten --}}
    @yield('content')

</div>

</body>
</html>
