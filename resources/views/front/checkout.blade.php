@extends('layout.front')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-primary text-white text-center py-4 rounded-top-4">
                    <h4 class="fw-bold mb-0">Checkout Kursus</h4>
                    <p class="mb-0 small text-white-50">Selesaikan pembayaran untuk akses materi</p>
                </div>
                <div class="card-body p-5">
                    
                  
                    <div class="alert alert-light border mb-4">
                        <h6 class="fw-bold text-muted mb-3">Kursus yang akan dibeli:</h6>
                        <div class="d-flex align-items-center gap-3">
                             <div>
                                 <h5 class="fw-bold mb-1">{{ $course->name }}</h5>
                                 <div class="text-primary fw-bold">Rp {{ number_format($course->price, 0, ',', '.') }}</div>
                             </div>
                        </div>
                    </div>
                    <div class="alert alert-info d-flex align-items-center mb-4 text-primary bg-primary bg-opacity-10 border-0 rounded-3" role="alert">
                         <i class="fas fa-info-circle me-3 fa-lg"></i>
                         <div>
                             Transfer ke BCA: <strong>123-456-7890</strong> a.n Codemy Indonesia
                         </div>
                    </div>

                    <form action="{{ route('front.checkout.store', $course) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted">Upload Bukti Transfer (Opsional)</label>
                            <input type="file" name="proof" class="form-control form-control-lg @error('proof') is-invalid @enderror">
                            @error('proof')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text mt-2">Format: JPG, PNG. Maks 2MB. Bisa dikosongkan untuk demo.</div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold py-3 shadow-sm transition-hover">
                                <i class="fas fa-lock me-2"></i> Bayar & Akses Kelas
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="text-center mt-4">
                 <a href="{{ route('front.index') }}" class="text-decoration-none text-muted small fw-bold">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

        </div>
    </div>
</div>
@endsection