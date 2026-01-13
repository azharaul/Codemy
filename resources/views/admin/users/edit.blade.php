@extends('layout.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Pengguna</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Pengguna</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <div class="d-flex align-items-center">
                        <div class="bg-info bg-opacity-10 text-info rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px;">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Edit Data Pengguna</h6>
                            <small class="text-muted">Mengubah data: <strong>{{ $user->name }}</strong></small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf @method('PUT')

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted"><i
                                    class="fas fa-user me-1"></i> Nama Lengkap</label>
                            <input type="text" name="name" class="form-control form-control-lg"
                                value="{{ $user->name }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted"><i
                                    class="fas fa-envelope me-1"></i> Alamat Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted"><i
                                    class="fas fa-briefcase me-1"></i> Pekerjaan</label>
                            <input type="text" name="occupation" class="form-control" value="{{ $user->occupation }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted"><i
                                    class="fas fa-user-tag me-1"></i> Role (Peran)</label>
                            <select name="role" class="form-select">
                                <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student (Siswa)
                                </option>
                                <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Teacher (Pengajar)
                                </option>
                            </select>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('users.index') }}" class="btn btn-light px-4">Batal</a>
                            <button type="submit" class="btn btn-primary px-4 fw-semibold">
                                <i class="fas fa-save me-1"></i> Update User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
