@extends('pages.home')

@section('title', 'Tambah Jabatan')

@section('content')
<div class="container">
    <h1 class="text-center">Tambah Jabatan</h1>
    <form action="{{ route('jabatan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_jabatan">Nama Jabatan</label>
            <input type="text" name="nama_jabatan" class="form-control" id="nama_jabatan" value="{{ old('nama_jabatan') }}" required>
            @error('nama_jabatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection
