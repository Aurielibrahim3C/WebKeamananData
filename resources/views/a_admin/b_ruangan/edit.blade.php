@extends('pages.home')

@section('title', 'Edit Ruangan')

@section('content')
<div class="container">
    <h1>Edit Ruangan</h1>
    <form action="{{ route('ruangan.update', $ruangan->id_ruangan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kode_ruangan" class="form-label">Kode Ruangan</label>
            <input type="text" class="form-control" id="kode_ruangan" name="kode_ruangan" value="{{ $ruangan->kode_ruangan }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" value="{{ $ruangan->nama_ruangan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('ruangan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
