@extends('layout.admin')

@section('content')
    <h1 class="mt-4">Buat Materi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Kursus</a></li>
        <li class="breadcrumb-item active">Buat Materi</li>
    </ol>

    <div class="card">
        <div class="card-header">Form Buat Materi</div>
        <div class="card-body">
            <form action="{{ route('lessons.store') }}" method="POST">
                @csrf

                @if(isset($course))
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                @else
                    <div class="mb-3">
                        <label for="course_id" class="form-label">Pilih Kursus</label>
                        <select name="course_id" id="course_id" class="form-select" required>
                            <option value="">-- Pilih Kursus --</option>
                            @foreach(App\Models\Course::all() as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Judul Materi</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug (opsional)</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}">
                </div>

                <div class="mb-3">
                    <label for="video_url" class="form-label">Video URL (opsional)</label>
                    <input type="url" name="video_url" id="video_url" class="form-control" value="{{ old('video_url') }}">
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-primary">Simpan</button>
                    @if(isset($course))
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-secondary">Batal</a>
                    @else
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Batal</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
