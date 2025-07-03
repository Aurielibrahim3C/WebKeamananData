@extends('pages.home')

@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Dashboard</h3>
                </div>
                <div class="card-body">
                    <p>Welcome, {{ auth()->user()->name }}!</p>
                    <p>This is your dashboard.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
