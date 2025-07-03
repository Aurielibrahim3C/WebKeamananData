@extends('pages.home')

@section('title', 'Detail Jurusan')

@section('content')
<div class="container">
    <h1 class="text-center">Detail Jurusan</h1>
    <table class="table table-bordered">
        <tr>
            <th>Kode Jurusan</th>
            <td>{{ $jurusan->kode_jurusan }}</td>
        </tr>
        <tr>
            <th>Nama Jurusan</th>
            <td>{{ $jurusan->nama_jurusan }}</td>
        </tr>
    </table>
    <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
