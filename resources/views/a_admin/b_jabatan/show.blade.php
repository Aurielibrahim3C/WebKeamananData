@extends('Pages.home')

@section('title', 'Detail Jabatan')

@section('content')
<div class="container">
    <h1 class="text-center">Detail Jabatan</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama Jabatan: {{ $jabatan->nama_jabatan }}</h5>
        </div>
    </div>
    <a href="{{ route('jabatan.index') }}" class="btn btn-primary mt-3">Kembali ke Daftar Jabatan</a>
</div>
@endsection
