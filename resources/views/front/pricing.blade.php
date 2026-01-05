@extends('layout.front')

@section('content')
    <!-- Header-->
    <header class="bg-primary bg-gradient text-white py-5">
        <div class="container px-5 text-center">
            <h1 class="display-5 fw-bold mb-2">Investasi Terbaik untuk Masa Depanmu</h1>
            <p class="lead fw-normal text-white-50 mb-0">Pilih paket belajar yang sesuai dengan kebutuhan dan budgetmu.</p>
        </div>
    </header>

    <!-- Pricing section-->
    <section class="py-5 bg-light">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <!-- Pricing card free-->
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-5 mb-xl-0 border-0 shadow-sm h-100">
                        <div class="card-body p-5">
                            <div class="small text-uppercase fw-bold text-muted">Gratis</div>
                            <div class="mb-3">
                                <span class="display-4 fw-bold">Rp 0</span>
                                <span class="text-muted">/ selamanya</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2 text-primary"><i class="fas fa-check me-2"></i><strong>Akses materi
                                        dasar</strong></li>
                                <li class="mb-2 text-primary"><i class="fas fa-check me-2"></i>Forum komunitas</li>
                                <li class="mb-2 text-muted text-decoration-line-through"><i
                                        class="fas fa-times me-2"></i>Sertifikat kompetensi</li>
                                <li class="mb-2 text-muted text-decoration-line-through"><i
                                        class="fas fa-times me-2"></i>Mentoring privat</li>
                                <li class="mb-2 text-muted text-decoration-line-through"><i
                                        class="fas fa-times me-2"></i>Download video</li>
                            </ul>
                            <div class="d-grid"><a class="btn btn-outline-primary fw-bold" href="#">Daftar Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pricing card pro-->
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-5 mb-xl-0 border-0 shadow-lg h-100 transform-scale-sm">
                        <div class="card-header bg-primary text-white text-center py-3 fw-bold">Paling Populer</div>
                        <div class="card-body p-5">
                            <div class="small text-uppercase fw-bold text-muted">Pro</div>
                            <div class="mb-3">
                                <span class="display-4 fw-bold">Rp 99rb</span>
                                <span class="text-muted">/ bulan</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2 text-primary"><i class="fas fa-check me-2"></i><strong>Akses SEMUA
                                        materi</strong></li>
                                <li class="mb-2 text-primary"><i class="fas fa-check me-2"></i>Sertifikat kompetensi</li>
                                <li class="mb-2 text-primary"><i class="fas fa-check me-2"></i>Forum komunitas + Prioritas
                                </li>
                                <li class="mb-2 text-primary"><i class="fas fa-check me-2"></i>Download source code</li>
                                <li class="mb-2 text-muted text-decoration-line-through"><i
                                        class="fas fa-times me-2"></i>Mentoring privat</li>
                            </ul>
                            <div class="d-grid"><a class="btn btn-primary fw-bold" href="#">Berlangganan Pro</a></div>
                        </div>
                    </div>
                </div>
                <!-- Pricing card enterprise-->
                <div class="col-lg-6 col-xl-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-5">
                            <div class="small text-uppercase fw-bold text-muted">Enterprise</div>
                            <div class="mb-3">
                                <span class="display-4 fw-bold">Rp 499rb</span>
                                <span class="text-muted">/ project</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2 text-primary"><i class="fas fa-check me-2"></i><strong>Semua fitur
                                        Pro</strong></li>
                                <li class="mb-2 text-primary"><i class="fas fa-check me-2"></i>Mentoring privat (1-on-1)
                                </li>
                                <li class="mb-2 text-primary"><i class="fas fa-check me-2"></i>Review portfolio</li>
                                <li class="mb-2 text-primary"><i class="fas fa-check me-2"></i>Jaminan kerja (Partner)</li>
                                <li class="mb-2 text-primary"><i class="fas fa-check me-2"></i>Asesmen Skill</li>
                            </ul>
                            <div class="d-grid"><a class="btn btn-outline-primary fw-bold" href="#">Hubungi Sales</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <p class="mb-0 text-muted">Punya pertanyaan seputar harga? <a href="#" class="text-decoration-none">Hubungi
                        kami</a></p>
            </div>
        </div>
    </section>
@endsection