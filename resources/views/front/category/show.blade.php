@extends('layout.front')

@section('content')
<div class="bg-primary bg-gradient py-5 mb-5">
    <div class="container py-5">
        <div class="text-center text-white">
            <h1 class="fw-bolder display-5">{{ $category->name }}</h1>
            <p class="lead fw-normal text-white-50 mb-0">Daftar kursus untuk kategori ini</p>
        </div>
    </div>
</div>

<div class="container pb-5">
    <div class="row gx-5">
        @forelse($courses as $course)
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                <img class="card-img-top" src="{{ $course->thumbnail ?? 'https://dummyimage.com/600x350/dee2e6/6c757d.jpg' }}" alt="..." style="height: 200px; object-fit: cover;" />
                <div class="card-body p-4">
                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                        {{ $category->name }}
                    </div>
                    @auth
                        @if(Auth::user()->hasActiveCourse($course->id))
                            <a class="text-decoration-none link-dark stretched-link" href="{{ route('front.learning', $course) }}">
                                <h5 class="card-title mb-3">{{ $course->name }}</h5>
                                <span class="badge bg-success">Akses Materi</span>
                            </a>
                        @else
                            <a class="text-decoration-none link-dark stretched-link" href="{{ route('front.checkout', $course) }}">
                                <h5 class="card-title mb-3">{{ $course->name }}</h5>
                                <span class="badge bg-warning text-dark">Beli Kursus</span>
                            </a>
                        @endif
                    @else
                        <a class="text-decoration-none link-dark stretched-link" href="{{ route('front.checkout', $course) }}">
                            <h5 class="card-title mb-3">{{ $course->name }}</h5>
                        </a>
                    @endauth
                    <p class="card-text mb-0 text-muted small">{{ Str::limit($course->about, 80) }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <div class="alert alert-info py-5">
                <i class="fas fa-search fa-3x mb-3 text-muted"></i>
                <p class="lead text-muted">Belum ada kursus di kategori ini.</p>
                <a href="{{ route('front.course.index') }}" class="btn btn-primary mt-3">Lihat Semua Kursus</a>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
