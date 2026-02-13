@extends('layouts.views')

@section('content')

<a href="{{ route('pengaduan.create') }}" class="btn btn-primary mb-3">
    + Buat Pengaduan
</a>

<h4>Status Pengaduan Saya</h4>

<table class="table table-bordered table-hover">
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
                <td>{{ $item->tgl_pengaduan }}</td>
                <td>{{ $item->isi_laporan }}</td>
                <td>
                    @if($item->status == '0')
                        <span class="badge bg-secondary">Menunggu</span>
                    @elseif($item->status == 'proses')
                        <span class="badge bg-warning">Diproses</span>
                    @elseif($item->status == 'selesai')
                        <span class="badge bg-success">Selesai</span>
                    @endif
                </td>
                <td>
                    {{ $item->tanggapan ?? 'Belum ada tanggapan' }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    Belum ada pengaduan.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
