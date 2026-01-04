@extends('layout.admin')

@section('content')
    <h1 class="mt-4">Buat Materi Baru</h1>

    <div class="card mb-4">
        <div class="card-header">
            Course: {{ $course->name }}
        </div>
        <div class="card-body">
            <form action="{{ route('lessons.store') }}" method="POST">
                @csrf
                <input type="hidden" name="course_id" value="{{ $course->id }}">

                <div class="mb-3">
                    <label class="form-label">Judul Materi</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Video URL</label>
                    <input type="url" name="video_url" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection