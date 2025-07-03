@extends('pages.home')

@section('title', 'Tempat PKL')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Tempat PKL</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('tempat_pkl.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah Tempat PKL
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Perusahaan</th>
                            <th class="text-center">Alamat Perusahaan</th>
                            <th class="text-center">Kuota</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tempat_pkl as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->nama_perusahaan }}</td>
                                <td class="text-center">{{ $item->alamat_perusahaan }}</td>
                                <td class="text-center">{{ $item->kuota }}</td>
                                <td class="text-center">{{ $item->status ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('tempat_pkl.show', $item->id_tempat_pkl) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Show
                                    </a>
                                    <a href="{{ route('tempat_pkl.edit', $item->id_tempat_pkl) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('tempat_pkl.destroy', $item->id_tempat_pkl) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tempat PKL ini?')">
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
