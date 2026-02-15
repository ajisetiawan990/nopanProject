@extends('layouts.views')

@section('content')
<div class="container my-4">

    <h2 class="mb-3">Dashboard Admin</h2>
    <p>Selamat datang, <b>{{ auth()->user()->name }}</b></p>

    <hr class="mb-4">

    <h4 class="mb-3">Daftar Pengaduan (Menunggu Verifikasi)</h4>

    <table class="table table-striped table-bordered align-middle text-center">
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
                <td class="text-start">{{ $item->isi_laporan }}</td>
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
                        {{ $item->tanggapan->tanggapan }}
                    @else
                        <span class="text-muted">Belum ada tanggapan</span>
                    @endif
                </td>
                <td>
                    @if($item->status == 'proses')
                        <form action="{{ route('admin.verifikasi', $item->id_pengaduan) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Verifikasi</button>
                        </form>
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
