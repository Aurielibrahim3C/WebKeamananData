@extends('pages.home')

@section('title','Tambah Mahasiswa')

@section('content')
<div class="container">
    <h1 class="my-4">Tambah Mahasiswa</h1>

    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ old('nim') }}" required>
            @error('nim')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_jurusan">Jurusan</label>
            <select name="id_jurusan" class="form-control" required>
                @foreach ($jurusan as $jurusan)
                    <option value="{{ $jurusan->id_jurusan }}" {{ old('id_jurusan') == $jurusan->id_jurusan ? 'selected' : '' }}>
                        {{ $jurusan->nama_jurusan }}
                    </option>
                @endforeach
            </select>
            @error('id_jurusan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_prodi">Prodi</label>
            <select name="id_prodi" class="form-control" required>
                @foreach ($prodi as $prodi)
                    <option value="{{ $prodi->id_prodi }}" {{ old('id_prodi') == $prodi->id_prodi ? 'selected' : '' }}>
                        {{ $prodi->nama_prodi }}
                    </option>
                @endforeach
            </select>
            @error('id_prodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Add Gender Field -->
        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select name="gender" class="form-control" required>
                <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('gender')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Add Access Field -->
        <div class="form-group">
            <label for="akses">Akses</label>
            <select name="akses" class="form-control" required>
                <option value="1" {{ old('akses') == 1 ? 'selected' : '' }}>Administrator</option>
                <option value="2" {{ old('akses') == 2 ? 'selected' : '' }}>Mahasiswa</option>
                <option value="3" {{ old('akses') == 3 ? 'selected' : '' }}>Dosen</option>
            </select>
            @error('akses')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" class="form-control">
            @error('foto')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_daftar">Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" class="form-control" value="{{ old('tanggal_daftar') }}" required>
            @error('tanggal_daftar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Add Password Field -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
