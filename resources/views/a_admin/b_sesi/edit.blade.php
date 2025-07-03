@extends('pages.home')

@section('title', 'Edit Sesi')

@section('content')
    <div class="container">
        <h1>Edit Sesi</h1>

        <form action="{{ route('sesi.update', $sesi->id_sesi) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_sesi">Nama Sesi</label>
                <input type="text" class="form-control" id="nama_sesi" name="nama_sesi" value="{{ $sesi->nama_sesi }}" required>
            </div>
            <div class="form-group">
                <label for="jam_mulai">Jam Mulai</label>
                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="{{ $sesi->jam_mulai }}" required>
            </div>
            <div class="form-group">
                <label for="jam_selesai">Jam Selesai</label>
                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="{{ $sesi->jam_selesai }}" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $sesi->keterangan }}">
            </div>

            <button type="submit" class="btn btn-success mt-3">Update</button>
        </form>
    </div>
@endsection
