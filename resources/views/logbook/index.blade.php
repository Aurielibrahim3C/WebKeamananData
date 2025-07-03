@extends('pages.home')

@section('title', 'Log Book Mahasiswa PKL')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Log Book Mahasiswa PKL</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('mahasiswa_pkl_log_book.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah Log Book
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tanggal Kegiatan Awal</th>
                            <th class="text-center">Tanggal Kegiatan Akhir</th>
                            <th class="text-center">Validasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($logBooks as $logBook)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $logBook->RegistrasiPkl->mahasiswa->nama ?? '-' }}</td>
                            <td class="text-center">{{ $logBook->tanggal_kegiatan_awal }}</td>
                            <td class="text-center">{{ $logBook->tanggal_kegiatan_akhir }}</td>
                            <td class="text-center">
                                <span class="badge {{ $logBook->validasi == '1' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $logBook->validasi == '1' ? 'Valid' : 'Not Valid' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    @if ($logBook->validasi !== '1')
                                    <form action="{{ route('mahasiswapkllogbook.acc', $logBook->id_mahasiswa_pkl_log_book) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin ingin meng-ACC data ini?')">
                                            <i class="bi bi-check-circle"></i> ACC
                                        </button>
                                    </form>
                                    @endif
                                    <a href="{{ route('mahasiswa_pkl_log_book.show', $logBook->id_mahasiswa_pkl_log_book) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Show
                                    </a>
                                    <a href="{{ route('mahasiswa_pkl_log_book.edit', $logBook->id_mahasiswa_pkl_log_book) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('mahasiswa_pkl_log_book.destroy', $logBook->id_mahasiswa_pkl_log_book) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus log book ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data log book mahasiswa PKL.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
