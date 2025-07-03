@extends('pages.home')

@section('title', 'Tambah Ruangan')

@section('content')
<div class="container">
    <h1>Tambah Ruangan</h1>
    <form action="{{ route('ruangan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode_ruangan" class="form-label">Kode Ruangan</label>
            <input type="text" class="form-control" id="kode_ruangan" name="kode_ruangan" placeholder="Masukkan kode ruangan" required>
        </div>
        <div class="mb-3">
            <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" placeholder="Masukkan nama ruangan" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('ruangan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
