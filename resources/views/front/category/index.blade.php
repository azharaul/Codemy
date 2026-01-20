@extends('layout.front')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bolder">Kategori</h2>
        <p class="lead fw-normal text-muted mb-0">Pilih topik yang ingin Anda kuasai</p>
    </div>

    <div class="row gx-5">
        @forelse($categories as $category)
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="{{ route('front.category.show', $category) }}" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm rounded-4 hover-top">
                    <div class="card-body p-5 text-center">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3 d-inline-block p-4">
                            <i class="fas fa-tags fa-2x"></i>
                        </div>
                        <h4 class="fw-bold mb-2 text-dark">{{ $category->name }}</h4>
                        <p class="text-muted mb-0">{{ $category->courses_count }} Kursus Tersedia</p>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="col-12 text-center">
            <div class="alert alert-warning">Belum ada kategori.</div>
        </div>
        @endforelse
    </div>
</div>
@endsection
