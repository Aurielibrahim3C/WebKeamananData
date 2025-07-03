@extends('pages.home')

@section('title', 'Create Golongan')

@section('content')
    <div class="container">
        <h1>Create Golongan</h1>
        <form action="{{ route('golongan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_golongan">Golongan Name</label>
                <input type="text" name="nama_golongan" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
