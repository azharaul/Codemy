@extends('layout.front')

@section('content')
<div class="container py-5 my-5">
    <div class="row align-items-center gx-5">
        <div class="col-lg-6 mb-5 mb-lg-0">
            <h1 class="fw-bolder display-5 mb-4">Tentang Codemy</h1>
            <p class="lead fw-normal text-muted mb-4">Codemy adalah platform belajar coding online yang didedikasikan untuk membantu talenta Indonesia menjadi developer kelas dunia.</p>
            <p class="text-muted mb-4">Kami percaya bahwa pendidikan berkualitas harus dapat diakses oleh siapa saja. Kurikulum kami dirancang oleh praktisi industri untuk memastikan materi yang relevan dan siap kerja.</p>
            <div class="d-flex gap-3">
                <div class="d-flex align-items-center">
                    <div class="icon-feature bg-primary bg-gradient rounded-circle text-white me-3 p-2">
                        <i class="fas fa-check"></i>
                    </div>
                    <span>Materi Terupdate</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="icon-feature bg-primary bg-gradient rounded-circle text-white me-3 p-2">
                        <i class="fas fa-check"></i>
                    </div>
                    <span>Mentor Expert</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <img class="img-fluid rounded-3 shadow-lg" src="https://dummyimage.com/600x400/343a40/6c757d" alt="About Us" />
        </div>
    </div>
</div>
@endsection
