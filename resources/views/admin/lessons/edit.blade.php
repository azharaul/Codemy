@extends('layout.admin')

@section('content')
    <h1 class="mt-4">Edit Materi</h1>

    <div class="card mb-4">
        <div class="card-header">
            Edit: {{ $lesson->name }}
        </div>
        <div class="card-body">
            <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Judul Materi</label>
                    <input type="text" name="name" class="form-control" value="{{ $lesson->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ $lesson->slug }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Video URL</label>
                    <input type="url" name="video_url" class="form-control" value="{{ $lesson->video_url }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('courses.show', $lesson->course_id) }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection