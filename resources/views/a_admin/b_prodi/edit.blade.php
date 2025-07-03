@extends('pages.home')

@section('title', 'Edit Prodi')

@section('content')
<div class="container">
    <h1 class="text-center">Edit Prodi</h1>
    <form action="{{ route('prodi.update', $prodi->id_prodi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_prodi">Nama Prodi</label>
            <input type="text" name="nama_prodi" class="form-control" id="nama_prodi" value="{{ old('nama_prodi', $prodi->nama_prodi) }}" required>
            @error('nama_prodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_jurusan">Jurusan</label>
            <select name="id_jurusan" class="form-control" id="id_jurusan" required>
                <option value="">Pilih Jurusan</option>
                @foreach($jurusan as $item)
                    <option value="{{ $item->id_jurusan }}" {{ old('id_jurusan', $prodi->id_jurusan) == $item->id_jurusan ? 'selected' : '' }}>{{ $item->nama_jurusan }}</option>
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
                    <option value="{{ $item->id_jenjang }}" {{ old('id_jenjang', $prodi->id_jenjang) == $item->id_jenjang ? 'selected' : '' }}>{{ $item->nama_jenjang }}</option>
                @endforeach
            </select>
            @error('id_jenjang')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-warning mt-3">Perbarui</button>
    </form>
</div>
@endsection
