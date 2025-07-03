@extends('pages.home')

@section('title','Edit Mahasiswa')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Mahasiswa</h1>

    <form action="{{ route('mahasiswa.update', $mahasiswa->id_mhs) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Add PUT method for update action -->

        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" required>
            @error('nim')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}" required>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_jurusan">Jurusan</label>
            <select name="id_jurusan" class="form-control" required>
                @foreach ($jurusan as $jurusan)
                    <option value="{{ $jurusan->id_jurusan }}" {{ old('id_jurusan', $mahasiswa->id_jurusan) == $jurusan->id_jurusan ? 'selected' : '' }}>
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
                    <option value="{{ $prodi->id_prodi }}" {{ old('id_prodi', $mahasiswa->id_prodi) == $prodi->id_prodi ? 'selected' : '' }}>
                        {{ $prodi->nama_prodi }}
                    </option>
                @endforeach
            </select>
            @error('id_prodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Edit Gender Field -->
        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select name="gender" class="form-control" required>
                <option value="L" {{ old('gender', $mahasiswa->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('gender', $mahasiswa->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('gender')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Edit Access Field -->
        <div class="form-group">
            <label for="akses">Akses</label>
            <select name="akses" class="form-control" required>
                <option value="1" {{ old('akses', $mahasiswa->akses) == 1 ? 'selected' : '' }}>Administrator</option>
                <option value="2" {{ old('akses', $mahasiswa->akses) == 2 ? 'selected' : '' }}>Mahasiswa</option>
                <option value="3" {{ old('akses', $mahasiswa->akses) == 3 ? 'selected' : '' }}>Dosen</option>
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
            <!-- Show the existing photo if any -->
            @if($mahasiswa->foto)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="Foto Mahasiswa" width="100">
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="tanggal_daftar">Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" class="form-control" value="{{ old('tanggal_daftar', $mahasiswa->tanggal_daftar) }}" required>
            @error('tanggal_daftar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Edit Password Field (if necessary, or leave blank if not to change) -->
        <div class="form-group">
            <label for="password">Password (Leave blank to keep current password)</label>
            <input type="password" name="password" class="form-control">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
