
@extends('pages.home')

@section('title', 'tambah data jenjang')


@section('content')
<div class="container">
    <h1 class="text-center">Input Jenjang</h1>
    <form action="{{ route('jenjang.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_jenjang">Nama Jenjang</label>
            <input type="text" class="form-control" id="nama_jenjang" name="nama_jenjang" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
