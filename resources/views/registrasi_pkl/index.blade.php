@extends('pages.home')

@section('title', 'Registrasi PKL')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Daftar Registrasi PKL</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('registrasi_pkl.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah Registrasi
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Mahasiswa</th>
                            <th class="text-center">Nama Perusahaan</th>
                            <th class="text-center">Alamat Perusahaan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($registrasi_pkl as $registrasi)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $registrasi->mahasiswa->nama }}</td>
                            <td class="text-center">{{ $registrasi->tempatPkl->nama_perusahaan ?? '-' }}</td>
                            <td class="text-center">{{ $registrasi->alamat_perusahaan }}</td>
                            <td class="text-center">{{ $registrasi->konfirmasi === '1' ? 'Dikonfirmasi' : 'Belum Dikonfirmasi' }}</td>
                            <td class="text-center">
                                <a href="{{ route('registrasi_pkl.show', $registrasi->id_registrasi_pkl) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Show
                                </a>
                                <a href="{{ route('registrasi_pkl.edit', $registrasi->id_registrasi_pkl) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('registrasi_pkl.destroy', $registrasi->id_registrasi_pkl) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus registrasi ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data registrasi PKL.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
