@extends('pages.home')

@section('content')
<div class="container">
    <h1>Create Log Book</h1>
    <form action="{{ route('mahasiswa_pkl_log_book.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_registrasi_pkl">Mahasiswa <span class="text-danger">*</span></label>
            <select name="id_registrasi_pkl" id="id_registrasi_pkl" class="form-control @error('id_registrasi_pkl') is-invalid @enderror">
                <option value="">Pilih Mahasiswa</option>
                @foreach($registrasi_pkl as $mahasiswapkl)
                    <option value="{{ $mahasiswapkl->id_registrasi_pkl }}"
                        {{ old('id_registrasi_pkl') == $mahasiswapkl->id_registrasi_pkl ? 'selected' : '' }}>
                        {{ $mahasiswapkl->mahasiswa->nama }}
                    </option>
                @endforeach
            </select>
            @error('id_registrasi_pkl')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_kegiatan_awal">Tanggal Kegiatan Awal</label>
            <input type="date" name="tanggal_kegiatan_awal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal_kegiatan_akhir">Tanggal Kegiatan Akhir</label>
            <input type="date" name="tanggal_kegiatan_akhir" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kegiatan">Kegiatan</label>
            <textarea name="kegiatan" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="file_dokumentasi">File Dokumentasi</label>
            <input type="file" name="file_dokumentasi" class="form-control">
        </div>
        <div class="form-group">
            <label for="komentar">Komentar</label>
            <textarea name="komentar" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="validasi">Validasi</label>
            <select name="validasi" class="form-control">
                <option value="0">Belum Validasi</option>
                <option value="1">Validasi</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
</div>
@endsection
