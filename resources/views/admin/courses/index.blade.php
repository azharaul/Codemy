@extends('layout.admin')
@section('content')
    <h1 class="mt-4">Daftar Kursus</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Kelola Kursus</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Daftar Kursus</span>
            <a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Tambah Kursus
            </a>
        </div>
        <div class="card-body">
            @if($courses->isEmpty())
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> Belum ada kursus. <a href="{{ route('courses.create') }}">Buat kursus baru</a>
                </div>
            @else
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kursus</th>
                            <th>Guru</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $key => $course)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <strong>{{ $course->name }}</strong>
                                    <br>
                                    <small class="text-muted">{{ Str::limit($course->about, 50) }}</small>
                                </td>
                                <td>{{ $course->teacher->name ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $course->category->name ?? '-' }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                                <td>
                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
