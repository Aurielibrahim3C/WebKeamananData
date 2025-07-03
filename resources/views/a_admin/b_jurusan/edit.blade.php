@extends('pages.home')

@section('title', 'Edit Jurusan')

@section('content')
<div class="container">
    <h1 class="text-center">Edit Jurusan</h1>
    <form action="{{ route('jurusan.update', $jurusan->id_jurusan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kode_jurusan">Kode Jurusan</label>
            <input type="text" name="kode_jurusan" id="kode_jurusan" value="{{ $jurusan->kode_jurusan }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama_jurusan">Nama Jurusan</label>
            <input type="text" name="nama_jurusan" id="nama_jurusan" value="{{ $jurusan->nama_jurusan }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
