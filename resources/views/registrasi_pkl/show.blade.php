
{{-- show.blade.php --}}
@extends('pages.home')
@section('title', 'Detail Registrasi PKL')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold mb-6">Detail Registrasi PKL</h1>

    <div class="mb-4">
        <h2 class="text-xl font-semibold">Nama Mahasiswa</h2>
        <p>{{ $registrasi->mahasiswa->nama }}</p>
    </div>

    <div class="mb-4">
        <h2 class="text-xl font-semibold">Nama Perusahaan</h2>
        <p>{{ $registrasi->tempatPkl->nama_perusahaan ?? '-' }}</p>
    </div>

    <div class="mb-4">
        <h2 class="text-xl font-semibold">Alamat Perusahaan</h2>
        <p>{{ $registrasi->alamat_perusahaan }}</p>
    </div>

    <div class="mb-4">
        <h2 class="text-xl font-semibold">Status</h2>
        <p>{{ $registrasi->konfirmasi === '1' ? 'Dikonfirmasi' : 'Belum Dikonfirmasi' }}</p>
    </div>

    <div class="mb-4">
        <h2 class="text-xl font-semibold">File Pendukung</h2>
        @if ($registrasi->file)
        <a href="{{ asset('storage/' . $registrasi->file) }}" target="_blank" class="text-blue-600 hover:underline">Download File</a>
        @else
        <p>Tidak ada file.</p>
        @endif
    </div>

    <a href="{{ route('registrasi_pkl.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700">Kembali</a>
</div>
@endsection
