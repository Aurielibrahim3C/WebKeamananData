@extends('pages.home')

@section('content')
<div class="container">
    <h1>Edit Log Book</h1>
    <form action="{{ route('mahasiswa_pkl_log_book.update', $logBook->id_mahasiswa_pkl_log_book) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_registrasi_pkl">Registrasi PKL</label>
            <select name="id_registrasi_pkl" class="form-control" required>
                @foreach($registrasiPkl as $registrasi)
                    <option value="{{ $registrasi->id_registrasi_pkl }}" {{ $logBook->id_registrasi_pkl == $registrasi->id_registrasi_pkl ? 'selected' : '' }}>
                        {{ $registrasi->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_kegiatan_awal">Tanggal Kegiatan Awal</label>
            <input type="date" name="tanggal_kegiatan_awal" class="form-control" value="{{ $logBook->tanggal_kegiatan_awal }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_kegiatan_akhir">Tanggal Kegiatan Akhir</label>
            <input type="date" name="tanggal_kegiatan_akhir" class="form-control" value="{{ $logBook->tanggal_kegiatan_akhir }}" required>
        </div>
        <div class="form-group">
            <label for="kegiatan">Kegiatan</label>
            <textarea name="kegiatan" class="form-control" required>{{ $logBook->kegiatan }}</textarea>
        </div>
        <div class="form-group">
            <label for="file_dokumentasi">File Dokumentasi</label>
            <input type="text" name="file_dokumentasi" class="form-control" value="{{ $logBook->file_dokumentasi }}">
        </div>
        <div class="form-group">
            <label for="komentar">Komentar</label>
            <textarea name="komentar" class="form-control">{{ $logBook->komentar }}</textarea>
        </div>
        <div class="form-group">
            <label for="validasi">Validasi</label>
            <select name="validasi" class="form-control">
                <option value="0" {{ $logBook->validasi == '0' ? 'selected' : '' }}>Belum Validasi</option>
                <option value="1" {{ $logBook->validasi == '1' ? 'selected' : '' }}>Validasi</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Update</button>
    </form>
</div>
@endsection
