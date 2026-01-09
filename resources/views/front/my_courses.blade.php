@extends('layout.front')

@section('content')

    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bold text-white mb-2">Kelas Saya</h1>
                        <p class="lead fw-normal text-white-50 mb-4">Lanjutkan pembelajaran Anda dan tingkatkan skill coding Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                @forelse($courses as $course)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                            <img class="card-img-top"
                                src="{{ $course->thumbnail ?? 'https://dummyimage.com/600x350/dee2e6/6c757d.jpg' }}" alt="..."
                                style="height: 200px; object-fit: cover;" />
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                                    {{ $course->category->name ?? 'Programming' }}</div>
                                
                                <a class="text-decoration-none link-dark stretched-link" href="{{ route('front.learning', $course) }}">
                                    <h5 class="card-title mb-3">{{ $course->name }}</h5>
                                </a>
                                <p class="card-text mb-0 text-muted small">{{ Str::limit($course->about, 80) }}</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="small">
                                            <div class="fw-bold">{{ $course->teacher->name ?? 'Codemy Team' }}</div>
                                            <div class="text-muted">{{ $course->created_at->format('d M, Y') }}</div>
                                        </div>
                                    </div>
                                    <a href="{{ route('front.learning', $course) }}" class="btn btn-sm btn-primary">Lanjut Belajar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="text-center">
                            <i class="fas fa-book-open fa-3x mb-3 text-muted"></i>
                            <p class="lead text-muted">Anda belum terdaftar di kelas manapun.</p>
                            <a href="{{ route('front.course.index') }}" class="btn btn-primary fw-bold">Cari Kelas</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection
