@extends('layout.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="alert alert-primary shadow-sm border-0 rounded-3 mb-4" role="alert">
        <div class="d-flex align-items-center">
            <div class="display-6 me-3"><i class="fas fa-rocket"></i></div>
            <div>
                <h4 class="alert-heading fw-bold mb-1">Selamat Datang di Codemy!</h4>
                <p class="mb-0">Halo Admin, berikut adalah ringkasan statistik platform pembelajaran Anda hari ini.</p>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <!-- Card 1: Siswa -->
        <div class="col-xl-4 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
                <div class="card-body position-relative">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-uppercase fw-bold text-muted small mb-1">Total Pengguna</p>
                            <h2 class="fw-bold mb-0 text-primary">{{ $stats['users'] }}</h2>
                        </div>
                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                            <i class="fas fa-users fa-lg"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light border-0 py-2 px-3">
                    <a href="{{ route('users.index') }}" class="text-decoration-none small fw-bold text-primary">
                        Kelola Pengguna <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Card 2: Kursus -->
        <div class="col-xl-4 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
                <div class="card-body position-relative">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-uppercase fw-bold text-muted small mb-1">Total Kursus</p>
                            <h2 class="fw-bold mb-0 text-success">{{ $stats['courses'] }}</h2>
                        </div>
                        <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                            <i class="fas fa-graduation-cap fa-lg"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light border-0 py-2 px-3">
                    <a href="{{ route('courses.index') }}" class="text-decoration-none small fw-bold text-success">
                        Kelola Kursus <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Card 3: Kategori -->
        <div class="col-xl-4 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
                <div class="card-body position-relative">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-uppercase fw-bold text-muted small mb-1">Kategori</p>
                            <h2 class="fw-bold mb-0 text-warning">{{ $stats['categories'] }}</h2>
                        </div>
                        <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                            <i class="fas fa-tags fa-lg"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light border-0 py-2 px-3">
                    <a href="{{ route('categories.index') }}" class="text-decoration-none small fw-bold text-warning">
                        Kelola Kategori <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection