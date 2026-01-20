@extends('layout.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Kursus</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Kursus</a></li>
            <li class="breadcrumb-item active">{{ $course->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">Informasi Kursus</h6>
                                <small class="text-muted">Detail lengkap mengenai kursus ini.</small>
                            </div>
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning text-white btn-sm shadow-sm" title="Edit Kursus">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kursus ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow-sm" title="Hapus Kursus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    @if($course->thumbnail)
                        <div class="mb-4 rounded-3 overflow-hidden shadow-sm border">
                            <img src="{{ $course->thumbnail }}" alt="{{ $course->name }}" class="img-fluid w-100" style="object-fit: cover; max-height: 400px;">
                        </div>
                    @endif

                    <div class="mb-4">
                        <label class="fw-bold text-muted small text-uppercase mb-1">Nama Kursus</label>
                        <h4 class="fw-bold text-dark">{{ $course->name }}</h4>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 border h-100">
                                <label class="fw-bold text-muted small text-uppercase mb-2"><i class="fas fa-chalkboard-teacher me-1"></i> Pengajar</label>
                                <div class="d-flex align-items-center">
                                    <div class="bg-white p-2 rounded-circle border me-2">
                                        <i class="fas fa-user-tie text-primary"></i>
                                    </div>
                                    <span class="fw-semibold">{{ $course->teacher->name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 border h-100">
                                <label class="fw-bold text-muted small text-uppercase mb-2"><i class="fas fa-tag me-1"></i> Kategori</label>
                                <div class="d-flex align-items-center">
                                    <div class="bg-white p-2 rounded-circle border me-2">
                                        <i class="fas fa-layer-group text-success"></i>
                                    </div>
                                    <span class="fw-semibold">{{ $course->category->name ?? 'Uncategorized' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="fw-bold text-muted small text-uppercase mb-2">Deskripsi</label>
                        <div class="bg-light p-3 rounded-3 border">
                            <p class="mb-0 text-secondary" style="line-height: 1.6;">{{ $course->about }}</p>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center p-3 border rounded-3">
                                <i class="fas fa-users fa-2x text-info opacity-50 me-3"></i>
                                <div>
                                    <h5 class="mb-0 fw-bold">{{ $course->students->count() }}</h5>
                                    <small class="text-muted">Total Siswa</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center p-3 border rounded-3">
                                <i class="fas fa-video fa-2x text-danger opacity-50 me-3"></i>
                                <div>
                                    <h5 class="mb-0 fw-bold">{{ $course->lessons->count() }}</h5>
                                    <small class="text-muted">Total Materi</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <a href="{{ route('courses.index') }}" class="btn btn-light shadow-sm px-4">
                        <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                <i class="fas fa-play-circle"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">Materi Kursus</h6>
                                <small class="text-muted">Daftar pelajaran.</small>
                            </div>
                        </div>
                        <a href="{{ route('lessons.create', ['course_id' => $course->id]) }}" class="btn btn-sm btn-primary rounded-circle shadow-sm" style="width: 32px; height: 32px; padding: 0; line-height: 32px; text-align: center;">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($course->lessons->isEmpty())
                        <div class="text-center py-5 px-3">
                            <div class="mb-3">
                                <i class="fas fa-film fa-3x text-muted opacity-25"></i>
                            </div>
                            <h6 class="fw-bold text-muted">Belum ada materi</h6>
                            <p class="small text-muted mb-3">Kursus ini belum memiliki konten pelajaran.</p>
                            <a href="{{ route('lessons.create', ['course_id' => $course->id]) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                <i class="fas fa-plus me-1"></i> Tambah Materi
                            </a>
                        </div>
                    @else
                        <div class="list-group list-group-flush">
                            @foreach($course->lessons as $lesson)
                                <div class="list-group-item border-0 border-bottom d-flex justify-content-between align-items-center p-3 hover-bg-light transition-all">
                                    <div class="d-flex align-items-center overflow-hidden">
                                        <div class="bg-light text-secondary rounded d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 36px; height: 36px; font-weight: bold; font-size: 0.8rem;">
                                            {{ $loop->iteration }}
                                        </div>
                                        <div class="text-truncate">
                                            <h6 class="mb-0 text-dark fw-semibold text-truncate">{{ $lesson->name }}</h6>
                                        </div>
                                    </div>
                                    <div class="btn-group ms-2">
                                        <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-light btn-sm text-secondary hover-text-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus materi ini?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-light btn-sm text-secondary hover-text-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
