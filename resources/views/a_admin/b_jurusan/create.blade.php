@extends('pages.home')

@section('title', 'Tambah Jurusan')

@section('content')
<div class="container">
    <h1 class="text-center">Tambah Jurusan</h1>
    <form action="{{ route('jurusan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode_jurusan">Kode Jurusan</label>
            <input type="text" name="kode_jurusan" id="kode_jurusan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama_jurusan">Nama Jurusan</label>
            <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
