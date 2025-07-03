@extends('pages.home')

@section('title', 'Data Mahasiswa')

@section('content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Daftar Mahasiswa</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah Mahasiswa
                </a>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Jurusan</th>
                            <th class="text-center">Prodi</th>
                            {{-- <th class="text-center">Foto</th> --}}
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $mhs)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama }}</td>
                                <td>{{ $mhs->jurusan->nama_jurusan }}</td>
                                <td>{{ $mhs->prodi->nama_prodi }}</td>
                                {{-- <td>
                                    <img src="{{ asset('storage/foto_mahasiswa/' . $mhs->foto) }}" alt="Foto Mahasiswa" width="100">
                                </td> --}}
                                <td class="text-center">
                                    <a href="{{ route('mahasiswa.show', $mhs->id_mhs) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('mahasiswa.edit', $mhs->id_mhs) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('mahasiswa.destroy', $mhs->id_mhs) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
