@extends('layouts.views')

@section('content')
<div class="container my-5">

    <h2 class="mb-4 animate-fade-slide">Dashboard Petugas</h2>
    <p class="mb-4">Selamat datang, <b>{{ auth()->user()->name }}</b></p>

    <hr>

    <h4 class="mb-3 animate-fade-slide">Daftar Pengaduan</h4>

    <div class="table-responsive animate-fade-slide">
        <table class="table table-striped table-hover align-middle shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
                    <th>Tanggapan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengaduan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tgl_pengaduan)->format('d-m-Y') }}</td>
                        <td>{{ $item->isi_laporan }}</td>
                        <td>
                            @if($item->status == '0')
                                <span class="badge bg-secondary">Menunggu</span>
                            @elseif($item->status == 'proses')
                                <span class="badge bg-warning text-dark">Diproses</span>
                            @elseif($item->status == 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @endif
                        </td>
                        <td>
                            @if($item->tanggapan)
                                <div class="p-2 bg-light rounded shadow-sm">
                                    {{ $item->tanggapan->tanggapan }}
                                </div>
                            @else
                                <span class="text-muted">Belum ada tanggapan</span>
                            @endif
                        </td>
                        <td>
                            @if(!$item->tanggapan)
                                <a href="{{ route('tanggapan.create', $item->id_pengaduan) }}" 
                                   class="btn btn-sm btn-primary animate-fade-slide">
                                    Beri Tanggapan
                                </a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Belum ada pengaduan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<style>
/* Animasi fade + slide */
@keyframes fadeSlideIn {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}

.animate-fade-slide {
    opacity: 0;
    animation: fadeSlideIn 0.6s forwards;
}

/* Hover efek pada row tabel */
.table-hover tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.1);
    transition: background-color 0.2s;
}

/* Badge lebih menarik */
.badge {
    font-size: 0.9rem;
}

/* Card shadow untuk tanggapan */
.bg-light {
    background-color: #f8f9fa !important;
}

/* Animasi tombol */
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0,0,0,0.2);
    transition: all 0.2s ease-in-out;
}
</style>
@endsection
