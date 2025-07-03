@extends('pages.home')

@section('title', 'Data Mahasiswa PKL')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Daftar Data Mahasiswa PKL</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('mahasiswa_pkl.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah Data Mahasiswa PKL
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Mahasiswa</th>
                            <th class="text-center">Judul PKL</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mahasiswa_pkl as $mahasiswaPkl)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $mahasiswaPkl->mahasiswa->nama ?? '-' }}</td>
                            <td class="text-center">{{ $mahasiswaPkl->judul }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('mahasiswa_pkl.show', $mahasiswaPkl->id_mahasiswa_pkl) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Show
                                    </a>
                                    <a href="{{ route('mahasiswa_pkl.edit', $mahasiswaPkl->id_mahasiswa_pkl) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('mahasiswa_pkl.destroy', $mahasiswaPkl->id_mahasiswa_pkl) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data mahasiswa PKL.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
