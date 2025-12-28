@extends('layout/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Manage Users</h1>
            <hr>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span
                                    class="badge bg-{{ $user->role == 'owner' ? 'danger' : ($user->role == 'teacher' ? 'warning' : 'primary') }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection