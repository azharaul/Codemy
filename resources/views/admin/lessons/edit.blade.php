@extends('layout.admin')

@section('content')
    <h1 class="mt-4">Edit Materi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Kursus</a></li>
        <li class="breadcrumb-item active">Edit Materi</li>
    </ol>

    <div class="card">
        <div class="card-header">Form Edit Materi: {{ $lesson->name }}</div>
        <div class="card-body">
            <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Judul Materi</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $lesson->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug (opsional)</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $lesson->slug) }}">
                </div>

                <div class="mb-3">
                    <label for="video_url" class="form-label">Video URL (opsional)</label>
                    <input type="url" name="video_url" id="video_url" class="form-control" value="{{ old('video_url', $lesson->video_url) }}">
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-primary">Simpan</button>
                    <a href="{{ route('courses.show', $lesson->course_id) }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
