@extends('Pages.home')

@section('title', 'Tambah Sesi')

@section('content')
    <div class="container">
        <h1>Tambah Sesi</h1>

        <form action="{{ route('sesi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_sesi">Nama Sesi</label>
                <input type="text" class="form-control" id="nama_sesi" name="nama_sesi" required>
            </div>
            <div class="form-group">
                <label for="jam_mulai">Jam Mulai</label>
                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
            </div>
            <div class="form-group">
                <label for="jam_selesai">Jam Selesai</label>
                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
            </div>

            <button type="submit" class="btn btn-success mt-3">Simpan</button>
        </form>
    </div>
@endsection
