@extends('layouts.views')

@section('content')
<style>
/* CSS sama persis seperti sebelumnya */
.form-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 80vh;
}

.form-card {
    width: 500px;
    background: #f8f9fa;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    opacity: 0;
    transform: translateY(30px);
    animation: fadeSlideIn 0.8s forwards;
}

.form-card h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #343a40;
}

.error-box {
    color: #721c24;
    background: #f8d7da;
    border: 1px solid #f5c6cb;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 15px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

.form-group textarea {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ced4da;
    resize: none;
}

button {
    background: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #0056b3;
}

@keyframes fadeSlideIn {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<div class="container form-wrapper">
    <div class="form-card">
        <h2>Buat Pengaduan</h2>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pengaduan.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="isi_laporan">Isi Laporan</label>
                <textarea name="isi_laporan" id="isi_laporan" rows="6"></textarea>
            </div>

            <div class="text-center">
                <button type="submit">Kirim Pengaduan</button>
            </div>
        </form>
    </div>
</div>
@endsection
