@extends('pages.home')

@section('title', 'Data Prodi')

@section('content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Data Prodi</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('prodi.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah Prodi
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
                            <th class="text-center">Nama Prodi</th>
                            <th class="text-center">Jurusan</th>
                            <th class="text-center">Jenjang</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($prodi as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_prodi }}</td>
                                <td>{{ $item->jurusan->nama_jurusan }}</td>
                                <td>{{ $item->jenjang->nama_jenjang }}</td>
                                <td class="text-center">
                                    <a href="{{ route('prodi.show', $item->id_prodi) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('prodi.edit', $item->id_prodi) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('prodi.destroy', $item->id_prodi) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus prodi ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Data prodi tidak tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

 @endsection
