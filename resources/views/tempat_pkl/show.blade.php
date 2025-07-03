@extends('pages.home')

@section('title', 'Tempat PKL')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl mb-6">Tempat PKL Details</h1>

        <div class="mb-4">
            <strong>Nama Perusahaan:</strong> {{ $tempatPkl->nama_perusahaan }}
        </div>

        <div class="mb-4">
            <strong>Alamat Perusahaan:</strong> {{ $tempatPkl->alamat_perusahaan }}
        </div>

        <div class="mb-4">
            <strong>Kuota:</strong> {{ $tempatPkl->kuota }}
        </div>

        <div class="mb-4">
            <strong>Status:</strong> {{ $tempatPkl->status ? 'Active' : 'Inactive' }}
        </div>

        <a href="{{ route('tempat_pkl.index') }}" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Back to list</a>
    </div>
@endsection
