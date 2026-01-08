@extends('layout.front')

@section('content')

    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-10">
                    <div class="my-5 text-start">
                        <h1 class="display-5 fw-bold text-white mb-2">Bangun Karirmu Sebagai Developer Handal</h1>
                        <p class="lead fw-normal text-white-50 mb-4">Pelajari skill coding terkini dengan kurikulum
                            industri. Mulai dari HTML, CSS, Laravel, hingga React. Belajar kapan saja, di mana saja.</p>
                        <div class="d-grid gap-3 d-sm-flex">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3 fw-bold" href="#courses">Mulai Belajar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <section class="py-5" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h2 class="fw-bolder mb-0">Cara terbaik untuk belajar coding.</h2>
                </div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3 p-3 d-inline-block"><i
                                    class="fas fa-code"></i></div>
                            <h2 class="h5">Materi Terupdate</h2>
                            <p class="mb-0">Kurikulum kami selalu diperbarui mengikuti standar industri teknologi masa kini.
                            </p>
                        </div>
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3 p-3 d-inline-block"><i
                                    class="fas fa-certificate"></i></div>
                            <h2 class="h5">Sertifikat Kompetensi</h2>
                            <p class="mb-0">Dapatkan sertifikat resmi setelah menyelesaikan setiap kursus dan proyek akhir.
                            </p>
                        </div>
                        <div class="col mb-5 mb-md-0 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3 p-3 d-inline-block"><i
                                    class="fas fa-users"></i></div>
                            <h2 class="h5">Komunitas Aktif</h2>
                            <p class="mb-0">Bergabung dengan ribuan developer lain di grup diskusi eksklusif kami.</p>
                        </div>
                        <div class="col h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3 p-3 d-inline-block"><i
                                    class="fas fa-chalkboard-teacher"></i></div>
                            <h2 class="h5">Mentor Expert</h2>
                            <p class="mb-0">Belajar langsung dari praktisi yang berpengalaman di bidangnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5 bg-light" id="courses">
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">Kursus Terbaru</h2>
                <p class="lead fw-normal text-muted mb-0">Tingkatkan skillmu dengan materi pilihan kami</p>
            </div>
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
                                
                                @auth
                                    @if(Auth::user()->hasActiveCourse($course->id))
                                        <a class="text-decoration-none link-dark stretched-link" href="{{ route('front.learning', $course->slug) }}">
                                            <h5 class="card-title mb-3">{{ $course->name }}</h5>
                                            <span class="badge bg-success">Akses Materi</span>
                                        </a>
                                    @else
                                        <a class="text-decoration-none link-dark stretched-link" href="{{ route('front.checkout', $course->slug) }}">
                                            <h5 class="card-title mb-3">{{ $course->name }}</h5>
                                            <span class="badge bg-warning text-dark">Beli Kursus</span>
                                        </a>
                                    @endif
                                @else
                                    <a class="text-decoration-none link-dark stretched-link" href="{{ route('front.checkout', $course->slug) }}">
                                        <h5 class="card-title mb-3">{{ $course->name }}</h5>
                                    </a>
                                @endauth
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
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Belum ada kursus yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('front.course.index') }}" class="btn btn-outline-primary fw-bold px-4">Lihat Semua Kursus</a>
            </div>
        </div>
    </section>

@endsection