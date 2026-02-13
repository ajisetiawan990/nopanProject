@extends('layouts.views')

@section('content')
<div class="container">

    <h2>Buat Pengaduan</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengaduan.store') }}" method="POST">
        @csrf

        <label>Isi Laporan</label><br>
        <textarea name="isi_laporan" rows="5" cols="50"></textarea>
        <br><br>

        <button type="submit">Kirim Pengaduan</button>
    </form>

</div>
@endsection
