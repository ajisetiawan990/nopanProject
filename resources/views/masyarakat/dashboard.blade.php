@extends('layouts.views')

@section('content')
<div class="container my-5">

    <a href="{{ route('pengaduan.create') }}" class="btn btn-primary mb-4 animate-fade-slide">
        + Buat Pengaduan
    </a>

    <h4 class="mb-3 animate-fade-slide">Status Pengaduan Saya</h4>

    <div class="table-responsive animate-fade-slide">
        <table class="table table-striped table-hover align-middle shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
                    <th>Tanggapan</th>
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
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

/* Badge warna lebih hidup */
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
