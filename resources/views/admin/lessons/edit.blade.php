@extends('layout.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Materi</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Kursus</a></li>
            <li class="breadcrumb-item"><a href="{{ route('courses.show', $lesson->course_id) }}">{{ $lesson->course->name }}</a></li>
            <li class="breadcrumb-item active">Edit Materi</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <div class="d-flex align-items-center">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Edit Materi</h6>
                            <small class="text-muted">Mengubah materi: <strong>{{ $lesson->name }}</strong></small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted"><i class="fas fa-heading me-1"></i> Judul Materi</label>
                            <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                value="{{ old('name', $lesson->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted"><i class="fas fa-link me-1"></i> Slug (URL)</label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                                value="{{ old('slug', $lesson->slug) }}" required>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted"><i class="fas fa-video me-1"></i> Video URL</label>
                            <input type="url" name="video_url" class="form-control @error('video_url') is-invalid @enderror"
                                value="{{ old('video_url', $lesson->video_url) }}" required>
                            @error('video_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('courses.show', $lesson->course_id) }}" class="btn btn-light px-4">Batal</a>
                            <button type="submit" class="btn btn-warning px-4 fw-semibold text-white">
                                <i class="fas fa-save me-1"></i> Update Materi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection