@extends('pages.home')

@section('title','Detail Mahasiswa')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Detail Mahasiswa</h1>

    <div class="card shadow-lg p-4">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="nim" class="fw-bold">NIM</label>
                </div>
                <div class="col-md-9">
                    <p>{{ $mahasiswa->nim }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="nama" class="fw-bold">Nama</label>
                </div>
                <div class="col-md-9">
                    <p>{{ $mahasiswa->nama }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="id_jurusan" class="fw-bold">Jurusan</label>
                </div>
                <div class="col-md-9">
                    <p>{{ $mahasiswa->jurusan->nama_jurusan }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="id_prodi" class="fw-bold">Prodi</label>
                </div>
                <div class="col-md-9">
                    <p>{{ $mahasiswa->prodi->nama_prodi }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="gender" class="fw-bold">Gender</label>
                </div>
                <div class="col-md-9">
                    <p>{{ $mahasiswa->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="akses" class="fw-bold">Akses</label>
                </div>
                <div class="col-md-9">
                    <p>{{ $mahasiswa->akses == 1 ? 'Admin' : 'Mahasiswa' }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="foto" class="fw-bold">Foto</label>
                </div>
                <div class="col-md-9">
                    <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="Foto Mahasiswa" class="img-fluid rounded">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="tanggal_daftar" class="fw-bold">Tanggal Daftar</label>
                </div>
                <div class="col-md-9">
                    <p>{{ \Carbon\Carbon::parse($mahasiswa->tanggal_daftar)->format('d F Y') }}</p>
                </div>
            </div>

            <div class="mb-3 text-end">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('head')
    <!-- Add Bootstrap CDN for styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJx3Jv9Hu8gA9vSfs2H1g1ptulGzO9zqumn4B14sU6+vZ54El8PCghscZXfA" crossorigin="anonymous">
@endsection

@section('scripts')
    <!-- Add Bootstrap CDN for JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8zX1gNBkbs2wm8DkF9n94EwZTwmW7fO5M0yNVw1P0Ex2YpF" crossorigin="anonymous"></script>
@endsection
