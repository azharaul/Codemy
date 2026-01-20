@extends('layout.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Kursus</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Kursus</a></li>
            <li class="breadcrumb-item active">Tambah Baru</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Form Kursus Baru</h6>
                            <small class="text-muted">Buat materi pembelajaran baru.</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold small text-uppercase text-muted"><i class="fas fa-heading me-1"></i> Nama Kursus</label>
                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                    name="name" placeholder="Nama Kursus..." value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold small text-uppercase text-muted"><i class="fas fa-money-bill-wave me-1"></i> Harga Kursus</label>
                                <input type="number" class="form-control form-control-lg @error('price') is-invalid @enderror" 
                                    name="price" placeholder="Harga Kursus" value="{{ old('price') }}" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold small text-uppercase text-muted"><i class="fas fa-tag me-1"></i> Kategori</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach(\App\Models\Category::all() as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold small text-uppercase text-muted"><i class="fas fa-chalkboard-teacher me-1"></i> Pengajar</label>
                                <select class="form-select @error('teacher_id') is-invalid @enderror" name="teacher_id" required>
                                    <option value="">-- Pilih Pengajar --</option>
                                    @foreach(\App\Models\User::where('role', 'teacher')->get() as $teacher)
                                        <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted"><i class="fas fa-align-left me-1"></i> Deskripsi</label>
                            <textarea class="form-control @error('about') is-invalid @enderror" name="about" 
                                rows="4" placeholder="Jelaskan tentang kursus ini..." required>{{ old('about') }}</textarea>
                            @error('about')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted"><i class="fas fa-image me-1"></i> URL Thumbnail</label>
                            <input type="text" class="form-control @error('thumbnail') is-invalid @enderror" 
                                name="thumbnail" placeholder="https://..." value="{{ old('thumbnail') }}">
                            <div class="form-text">Masukkan URL gambar untuk cover kursus.</div>
                            @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('courses.index') }}" class="btn btn-light px-4">Batal</a>
                            <button type="submit" class="btn btn-primary px-4 fw-semibold">
                                <i class="fas fa-save me-1"></i> Simpan Kursus
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
