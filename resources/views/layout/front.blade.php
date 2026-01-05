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
    
    <!-- Link ke CSS SB Admin (Bisa diganti atau dicustom, kita pakai base-nya saja tapi dimodifikasi inline) -->
    <link href="{{ asset('startbootstrap-sb-admin-gh-pages/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: 700;
            letter-spacing: -0.5px;
            font-size: 1.5rem;
        }
        .nav-link {
            font-weight: 500;
        }
        main {
            min-height: 80vh;
        }
        /* Custom Footer */
        footer {
            background-color: #fff;
            border-top: 1px solid #e9ecef;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm sticky-top">
            <div class="container px-5">
                <a class="navbar-brand text-primary" href="{{ route('front.index') }}">
                    <i class="fas fa-code me-2"></i>Codemy
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-lg-4">
                        <li class="nav-item"><a class="nav-link" href="{{ route('front.index') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
                    </ul>
                    
                    @if (Route::has('login'))
                        <div class="d-flex align-items-center gap-2">
                            @auth
                                <div class="dropdown">
                                    <a class="btn btn-outline-primary dropdown-toggle rounded-pill px-4" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt me-2 text-muted"></i> Dashboard</a></li>
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
    <script src="{{ asset('startbootstrap-sb-admin-gh-pages/js/scripts.js') }}"></script>
</body>
</html>