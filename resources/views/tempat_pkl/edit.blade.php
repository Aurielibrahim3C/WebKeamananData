@extends('pages.home')
@section('title', 'Tempat PKL')

@section('content')
    <!-- Add Bootstrap and Font Awesome CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Edit Tempat PKL</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('tempat_pkl.update', $tempatPkl->id_tempat_pkl) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" value="{{ $tempatPkl->nama_perusahaan }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan</label>
                        <input type="text" name="alamat_perusahaan" id="alamat_perusahaan" class="form-control" value="{{ $tempatPkl->alamat_perusahaan }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="kuota" class="form-label">Kuota</label>
                        <input type="number" name="kuota" id="kuota" class="form-control" value="{{ $tempatPkl->kuota }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="1" {{ $tempatPkl->status ? 'selected' : '' }}>Tersedia</option>
                            <option value="0" {{ !$tempatPkl->status ? 'selected' : '' }}>Tidak Tersedia</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update <i class="fas fa-save"></i></button>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
