<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Platform Belajar Koding Bahasa Indonesia - Codemy" />
    <meta name="author" content="Codemy" />
    <title>Codemy - Belajar Koding Mulai Dari Sini</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Link ke CSS Bootstrap 5 (Ganti local Styles) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    

</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm sticky-top">
            <div class="container px-5">
                <a class="navbar-brand fw-bold text-primary" href="{{ route('front.index') }}">
                    <i class="fas fa-code me-2"></i>Codemy
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-lg-4">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('front.index') ? 'active text-primary fw-bold' : '' }}" href="{{ route('front.index') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('front.course*') ? 'active text-primary fw-bold' : '' }}" href="{{ route('front.course.index') }}">Kursus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('front.category*') ? 'active text-primary fw-bold' : '' }}" href="{{ route('front.category.index') }}">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('front.about') ? 'active text-primary fw-bold' : '' }}" href="{{ route('front.about') }}">Tentang Kami</a>
                        </li>
                    </ul>
                    
                    @if (Route::has('login'))
                        <div class="d-flex align-items-center gap-2">
                            @auth
                                <div class="dropdown">
                                    <a class="btn btn-outline-primary dropdown-toggle rounded-pill px-4" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="dropdownMenuLink">
                                       <!-- Hanya Teacher yang butuh akses ke Dashboard Admin -->
                                        @if(Auth::user()->role === 'teacher')
                                            <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt me-2 text-muted"></i> Dashboard</a></li>
                                        @endif
                                        <li><a class="dropdown-item" href="{{ route('front.my_courses') }}"><i class="fas fa-book me-2 text-muted"></i> Kelas Saya</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i> Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4 fw-bold">Masuk</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">Daftar</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>
        
        <!-- Page Content-->
        @yield('content')
        
    </main>

    <!-- Footer-->
    <footer class="py-5 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto"><div class="small m-0 text-muted">Copyright &copy; Codemy - Belajar Koding {{ date('Y') }}</div></div>
                <div class="col-auto">
                    <a class="link-dark small text-decoration-none" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-dark small text-decoration-none" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-dark small text-decoration-none" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>