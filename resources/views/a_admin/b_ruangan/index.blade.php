@extends('pages.home')

@section('title', 'Ruangan')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Daftar Ruangan</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('ruangan.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah Ruangan
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Ruangan</th>
                            <th class="text-center">Nama Ruangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ruangans as $ruangan)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $ruangan->kode_ruangan }}</td>
                                <td>{{ $ruangan->nama_ruangan }}</td>
                                <td class="text-center">
                                    <a href="{{ route('ruangan.edit', $ruangan->id_ruangan) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('ruangan.destroy', $ruangan->id_ruangan) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus ruangan ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Data ruangan tidak tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
