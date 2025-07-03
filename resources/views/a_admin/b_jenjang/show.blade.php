
@extends('pages.home')

@section('title', 'detail Jenjang')


@section('content')
<div class="container">
    <h1>Detail Jenjang</h1>
    <p><strong>ID:</strong> {{ $jenjang->id_jenjang }}</p>
    <p><strong>Nama Jenjang:</strong> {{ $jenjang->nama_jenjang }}</p>
    <a href="{{ route('jenjang.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
