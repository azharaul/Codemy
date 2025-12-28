@extends('layout/admin')
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Edit User</h1>
            <hr>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>
                <div class="mb-3">
                    <label>Occupation</label>
                    <input type="text" name="occupation" class="form-control" value="{{ $user->occupation }}">
                </div>
                <div class="mb-3">
                    <label>Role</label>
                    <select name="role" class="form-select">
                        <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                        <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Teacher</option>
                        <option value="owner" {{ $user->role == 'owner' ? 'selected' : '' }}>Owner</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection