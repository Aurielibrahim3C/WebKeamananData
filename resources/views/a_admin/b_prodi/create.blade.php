@extends('pages.home')

@section('title', 'Tambah Prodi')

@section('content')
<div class="container">
    <h1 class="text-center">Tambah Prodi</h1>
    <form action="{{ route('prodi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_prodi">Nama Prodi</label>
            <input type="text" name="nama_prodi" class="form-control" id="nama_prodi" value="{{ old('nama_prodi') }}" required>
            @error('nama_prodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_jurusan">Jurusan</label>
            <select name="id_jurusan" class="form-control" id="id_jurusan" required>
                <option value="">Pilih Jurusan</option>
                @foreach($jurusan as $item)
                    <option value="{{ $item->id_jurusan }}" {{ old('id_jurusan') == $item->id_jurusan ? 'selected' : '' }}>{{ $item->nama_jurusan }}</option>
                @endforeach
            </select>
            @error('id_jurusan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_jenjang">Jenjang</label>
            <select name="id_jenjang" class="form-control" id="id_jenjang" required>
                <option value="">Pilih Jenjang</option>
                @foreach($jenjang as $item)
                    <option value="{{ $item->id_jenjang }}" {{ old('id_jenjang') == $item->id_jenjang ? 'selected' : '' }}>{{ $item->nama_jenjang }}</option>
                @endforeach
            </select>
            @error('id_jenjang')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection
