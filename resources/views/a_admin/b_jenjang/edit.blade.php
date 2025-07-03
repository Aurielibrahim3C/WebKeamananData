@extends('pages.home')

@section('title', 'edit  data jenjang')


@section('content')
<div class="container">
    <h1>Edit Jenjang</h1>
    <form action="{{ route('jenjang.update', $jenjang->id_jenjang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_jenjang">Nama Jenjang</label>
            <input type="text" class="form-control" id="nama_jenjang" name="nama_jenjang" value="{{ $jenjang->nama_jenjang }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
