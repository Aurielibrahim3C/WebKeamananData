@extends('pages.home')

@section('title', 'Daftar Dosen')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Daftar Dosen</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('dosens.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah Dosen
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIDN</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dosens as $dosen)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $dosen->nidn }}</td>
                                <td class="text-center">{{ $dosen->nama }}</td>
                                <td class="text-center">{{ $dosen->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('dosens.show', $dosen->id_dosen) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Show
                                    </a>
                                    <a href="{{ route('dosens.edit', $dosen->id_dosen) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('dosens.destroy', $dosen->id_dosen) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus dosen ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Data dosen tidak tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
