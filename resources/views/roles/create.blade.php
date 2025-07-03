@extends('pages.home')

@section('title', 'add Roles')

@section('content')
<div class="container">
    <h1>Create New Role</h1>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="role" class="form-label">Role Name</label>
            <input type="text" class="form-control" id="role" name="role" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
