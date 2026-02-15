@extends('layouts.views')

@section('content')
<div class="container my-5">

    <h2 class="mb-4 animate-fade-slide">Beri Tanggapan</h2>

    <div class="card shadow-sm mb-4 animate-fade-slide" style="animation-delay: 0.1s;">
        <div class="card-body">
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pengaduan->tgl_pengaduan)->format('d-m-Y') }}</p>
            <p><strong>Isi Laporan:</strong></p>
            <div class="p-3 bg-light rounded">
                {{ $pengaduan->isi_laporan }}
            </div>
        </div>
    </div>

    <form action="{{ route('tanggapan.store', $pengaduan->id_pengaduan) }}" method="POST" class="animate-fade-slide" style="animation-delay: 0.2s;">
        @csrf

        <div class="mb-3">
            <label for="tanggapan" class="form-label">Tanggapan:</label>
            <textarea id="tanggapan" name="tanggapan" rows="6" class="form-control" placeholder="Tuliskan tanggapan Anda..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-lg">Kirim Tanggapan</button>
    </form>

</div>

<style>
/* Animasi fade + slide */
@keyframes fadeSlideIn {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-slide {
    opacity: 0;
    animation: fadeSlideIn 0.6s forwards;
}

/* Animasi hover pada tombol */
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0,0,0,0.2);
    transition: all 0.2s ease-in-out;
}

/* Card laporan */
.card {
    border-radius: 10px;
}

/* Textarea focus */
textarea:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
    outline: none;
    transition: all 0.2s ease-in-out;
}
</style>
@endsection
