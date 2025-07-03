@extends('pages.home')

@section('content')
<div class="container">
    <h1 class="my-4">Log Book Details</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-primary">Nama Mahasiswa</h5>
            <p class="card-text">{{ $logBook->RegistrasiPkl->mahasiswa->nama ?? '-' }}</p>

            <hr>

            <h5 class="card-title text-info">Kegiatan</h5>
            <p class="card-text">{{ $logBook->kegiatan }}</p>

            <div class="row">
                <div class="col-md-6">
                    <h6><strong>Tanggal Kegiatan Awal:</strong></h6>
                    <p>{{ $logBook->tanggal_kegiatan_awal }}</p>
                </div>
                <div class="col-md-6">
                    <h6><strong>Tanggal Kegiatan Akhir:</strong></h6>
                    <p>{{ $logBook->tanggal_kegiatan_akhir }}</p>
                </div>
            </div>

            <hr>

            <h6 class="text-secondary"><strong>File Dokumentasi:</strong></h6>
            <p>
                @if($logBook->file_dokumentasi)
                    <a href="{{ asset('storage/' . $logBook->file_dokumentasi) }}" class="btn btn-link" target="_blank">
                        <i class="bi bi-file-earmark-earbuds"></i> View File
                    </a>
                @else
                    <span class="text-muted">No documentation file uploaded.</span>
                @endif
            </p>

            <hr>

            <h6 class="text-warning"><strong>Komentar:</strong></h6>
            <p>{{ $logBook->komentar }}</p>

            <hr>

            <h6 class="text-success"><strong>Validasi:</strong></h6>
            <span class="badge {{ $logBook->validasi == '1' ? 'bg-success' : 'bg-danger' }}">
                {{ $logBook->validasi == '1' ? 'Valid' : 'Not Valid' }}
            </span>
        </div>
    </div>

    <a href="{{ route('mahasiswa_pkl_log_book.index') }}" class="btn btn-primary mt-3">
        <i class="bi bi-arrow-left-circle"></i> Back
    </a>
</div>
@endsection
