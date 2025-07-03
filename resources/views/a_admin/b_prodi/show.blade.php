@extends('pages.home')

@section('title', 'Detail Prodi')

@section('content')
<div class="container">
    <h1 class="text-center">Detail Prodi</h1>
    <div class="form-group">
        <label>Nama Prodi</label>
        <p>{{ $prodi->nama_prodi }}</p>
    </div>
    <div class="form-group">
        <label>Jurusan</label>
        <p>{{ $prodi->jurusan->nama_jurusan }}</p>
    </div>
    <div class="form-group">
        <label>Jenjang</label>
        <p>{{ $prodi->jenjang->nama_jenjang }}</p>
    </div>
    <a href="{{ route('prodi.index') }}" class="btn btn-primary">Kembali ke Daftar Prodi</a>
</div>
@endsection
