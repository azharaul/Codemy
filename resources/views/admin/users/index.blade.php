@extends('layout.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola Pengguna</h1>
    </div>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 py-3 ps-4" width="5%">#</th>
                            <th class="border-0 py-3" width="30%">NAMA</th>
                            <th class="border-0 py-3" width="30%">EMAIL</th>
                            <th class="border-0 py-3" width="20%">ROLE</th>
                            <th class="border-0 py-3 pe-4 text-end" width="15%">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="ps-4 fw-bold text-muted">{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-secondary bg-opacity-10 text-secondary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <span class="fw-bold text-dark">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role == 'owner')
                                        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger px-3">Owner</span>
                                    @elseif($user->role == 'teacher')
                                        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning px-3">Teacher</span>
                                    @else
                                        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary px-3">Student</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-light text-warning shadow-sm me-2" title="Edit User">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus user ini?');">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-light text-danger shadow-sm" title="Hapus User">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection