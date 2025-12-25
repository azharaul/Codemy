@extends('layout.admin')
@section('content')
    <h1 class="mt-4">Edit Kursus</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Kursus</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">Form Edit Kursus: {{ $course->name }}</div>
                <div class="card-body">
                    <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kursus</label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="name" 
                                name="name" 
                                placeholder="Masukkan nama kursus"
                                value="{{ old('name', $course->name) }}"
                                required
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input 
                                type="text" 
                                class="form-control @error('slug') is-invalid @enderror" 
                                id="slug" 
                                name="slug" 
                                placeholder="Slug"
                                value="{{ old('slug', $course->slug) }}"
                            >
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="about" class="form-label">Deskripsi</label>
                            <textarea 
                                class="form-control @error('about') is-invalid @enderror" 
                                id="about" 
                                name="about" 
                                rows="4" 
                                placeholder="Deskripsi kursus"
                                required
                            >{{ old('about', $course->about) }}</textarea>
                            @error('about')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select 
                                class="form-control @error('category_id') is-invalid @enderror" 
                                id="category_id" 
                                name="category_id"
                                required
                            >
                                <option value="">Pilih Kategori</option>
                                @foreach(\App\Models\Category::all() as $category)
                                    <option 
                                        value="{{ $category->id }}" 
                                        {{ old('category_id', $course->category_id) == $category->id ? 'selected' : '' }}
                                    >
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="teacher_id" class="form-label">Guru</label>
                            <select 
                                class="form-control @error('teacher_id') is-invalid @enderror" 
                                id="teacher_id" 
                                name="teacher_id"
                                required
                            >
                                <option value="">Pilih Guru</option>
                                @foreach(\App\Models\User::where('role', 'teacher')->get() as $teacher)
                                    <option 
                                        value="{{ $teacher->id }}" 
                                        {{ old('teacher_id', $course->teacher_id) == $teacher->id ? 'selected' : '' }}
                                    >
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input 
                                type="text" 
                                class="form-control @error('thumbnail') is-invalid @enderror" 
                                id="thumbnail" 
                                name="thumbnail" 
                                placeholder="URL thumbnail gambar"
                                value="{{ old('thumbnail', $course->thumbnail) }}"
                            >
                            <small class="form-text text-muted">Contoh: https://placehold.co/600x400</small>
                            @if($course->thumbnail)
                                <div class="mt-2">
                                    <img src="{{ $course->thumbnail }}" alt="{{ $course->name }}" style="max-width: 200px;" class="img-thumbnail">
                                </div>
                            @endif
                            @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update
                            </button>
                            <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-generate slug from name
        document.getElementById('name').addEventListener('keyup', function() {
            const name = this.value;
            const slug = name
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_]+/g, '-')
                .replace(/^-+|-+$/g, '');
            document.getElementById('slug').value = slug;
        });
    </script>
@endsection
