@extends('pages.home')
@section('title', 'Tambah Registrasi PKL')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Tambah Registrasi PKL</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('registrasi_pkl.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Dropdown Mahasiswa -->
                        <div class="mb-3">
                            <label for="id_mhs" class="form-label">Mahasiswa</label>
                            <select name="id_mhs" id="id_mhs" class="form-select shadow-sm" required>
                                <option value="">-- Pilih Mahasiswa --</option>
                                @foreach($mahasiswa as $mhs)
                                    <option value="{{ $mhs->id_mhs }}">{{ $mhs->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Dropdown Tempat PKL -->
                        <div class="mb-3">
                            <label for="id_tempat_pkl" class="form-label">Tempat PKL</label>
                            <select name="id_tempat_pkl" id="id_tempat_pkl" class="form-select shadow-sm">
                                <option value="">-- Pilih Tempat PKL --</option>
                                @foreach($tempatPkl as $tempat)
                                    <option value="{{ $tempat->id_tempat_pkl }}">{{ $tempat->nama_perusahaan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Alamat Perusahaan -->
                        <div class="mb-3">
                            <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan</label>
                            <input type="text" name="alamat_perusahaan" id="alamat_perusahaan"
                                   class="form-control shadow-sm" required>
                        </div>

                        <!-- File Pendukung -->
                        <div class="mb-3">
                            <label for="file" class="form-label">File Pendukung</label>
                            <input type="file" name="file" id="file" class="form-control shadow-sm">
                        </div>

                        <!-- Button Submit dan Batal -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                            <a href="{{ route('registrasi_pkl.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
