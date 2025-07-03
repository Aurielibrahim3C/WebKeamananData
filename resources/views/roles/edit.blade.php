@extends('pages.home')

@section('title', 'edit Roles')

@section('content')
<div class="container">
    <h1>Edit Role</h1>
    <form action="{{ route('roles.update', $role->role_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="role" class="form-label">Role Name</label>
            <input type="text" class="form-control" id="role" name="role" value="{{ $role->role }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
