@extends('pages.home')

@section('title', 'Daftar Sesi')

@section('content')

<div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Daftar Sesi</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="{{ route('sesi.create') }}" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Tambah Sesi
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
                                <th class="text-center">Nama Sesi</th>
                                <th class="text-center">Jam Mulai</th>
                                <th class="text-center">Jam Selesai</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sesi as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_sesi }}</td>
                                    <td>{{ $item->jam_mulai }}</td>
                                    <td>{{ $item->jam_selesai }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('sesi.edit', $item->id_sesi) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('sesi.destroy', $item->id_sesi) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus sesi ini?')">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Data sesi tidak tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
