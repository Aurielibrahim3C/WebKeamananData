@extends('pages.home')

@section('title', 'Data Jabatan')

@section('content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Data Jabatan</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('jabatan.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah Jabatan
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Jabatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jabatan as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_jabatan }}</td>
                                <td class="text-center">
                                    <a href="{{ route('jabatan.show', $item->id_jabatan) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('jabatan.edit', $item->id_jabatan) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('jabatan.destroy', $item->id_jabatan) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jabatan ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Data jabatan tidak tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
