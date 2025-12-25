@extends('layout.admin')
@section('content')
    <h1 class="mt-4">{{ $course->name }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Kursus</a></li>
        <li class="breadcrumb-item active">{{ $course->name }}</li>
    </ol>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Detail Kursus</span>
                    <div>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    @if($course->thumbnail)
                        <div class="mb-3">
                            <img src="{{ $course->thumbnail }}" alt="{{ $course->name }}" class="img-fluid rounded" style="max-height: 400px;">
                        </div>
                    @endif

                    <div class="mb-3">
                        <h5>Nama Kursus</h5>
                        <p class="fs-5">{{ $course->name }}</p>
                    </div>

                    <div class="mb-3">
                        <h5>Slug</h5>
                        <p class="text-muted">{{ $course->slug }}</p>
                    </div>

                    <div class="mb-3">
                        <h5>Deskripsi</h5>
                        <p>{{ $course->about }}</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Guru</h5>
                            <p class="badge bg-info">{{ $course->teacher->name ?? '-' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Kategori</h5>
                            <p class="badge bg-success">{{ $course->category->name ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5>Jumlah Siswa</h5>
                            <p class="fs-5">
                                <span class="badge bg-primary">{{ $course->students->count() }} Siswa</span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h5>Jumlah Materi</h5>
                            <p class="fs-5">
                                <span class="badge bg-secondary">{{ $course->lessons->count() }} Materi</span>
                            </p>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex gap-2">
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
