@extends('pages.home')

@section('title', 'Edit Golongan')

@section('content')
    <div class="container">
        <h1>Edit Golongan</h1>
        <form action="{{ route('golongan.update', $golongan->id_golongan) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_golongan">Golongan Name</label>
                <input type="text" name="nama_golongan" class="form-control" value="{{ $golongan->nama_golongan }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
