@extends('pages.home')

@section('title', 'Edit Jabatan')

@section('content')
<div class="container">
    <h1 class="text-center">Edit Jabatan</h1>
    <form action="{{ route('jabatan.update', $jabatan->id_jabatan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_jabatan">Nama Jabatan</label>
            <input type="text" name="nama_jabatan" class="form-control" id="nama_jabatan" value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}" required>
            @error('nama_jabatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
