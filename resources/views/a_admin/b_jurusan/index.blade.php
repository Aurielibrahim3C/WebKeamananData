@extends('pages.home')

@section('title', 'Data Jurusan')

@section('content')


<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Data Jurusan</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('jurusan.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah Jurusan
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Jurusan</th>
                            <th class="text-center">Nama Jurusan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jurusan as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->kode_jurusan }}</td>
                                <td>{{ $item->nama_jurusan }}</td>
                                <td class="text-center">
                                    <a href="{{ route('jurusan.show', $item->id_jurusan) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('jurusan.edit', $item->id_jurusan) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('jurusan.destroy', $item->id_jurusan) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jurusan ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Data jurusan tidak tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
