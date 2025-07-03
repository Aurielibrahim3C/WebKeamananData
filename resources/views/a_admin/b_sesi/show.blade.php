@extends('pages.home')

@section('title', 'Detail Sesi')


@section('content')
    <div class="container">
        <h1>Detail Sesi</h1>

        <p><strong>Nama Sesi:</strong> {{ $sesi->nama_sesi }}</p>
        <p><strong>Jam Mulai:</strong> {{ $sesi->jam_mulai }}</p>
        <p><strong>Jam Selesai:</strong> {{ $sesi->jam_selesai }}</p>
        <p><strong>Keterangan:</strong> {{ $sesi->keterangan }}</p>

        <a href="{{ route('sesi.index') }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
