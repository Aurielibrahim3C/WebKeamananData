@extends('pages.home')

@section('title', 'Golongan Details')
@section('content')
    <div class="container">
        <h1>Golongan Details</h1>
        <p><strong>Name:</strong> {{ $golongan->nama_golongan }}</p>
        <a href="{{ route('golongan.index') }}" class="btn btn-primary">Back to List</a>
    </div>
@endsection
