<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Login to Codemy" />
    <meta name="author" content="Codemy" />
    <title>Masuk - Codemy</title>
    <link href="{{ asset('startbootstrap-sb-admin-gh-pages/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(135deg, #0d6efd 0%, #0099ff 100%);
            min-height: 100vh;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-code fa-2x"></i>
                        </div>
                        <h3 class="fw-bold text-dark">Selamat Datang!</h3>
                        <p class="text-muted small">Silakan masuk untuk melanjutkan belajar.</p>
                    </div>
                    <div class="card-body p-4 pt-2">
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf

                            @if(session('error'))
                                <div class="alert alert-danger mb-3 py-2 small">
                                    <i class="fas fa-exclamation-circle me-1"></i> {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label text-muted small fw-bold text-uppercase">Email</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i
                                            class="fas fa-envelope"></i></span>
                                    <input class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror"
                                        type="email" name="email" placeholder="nama@email.com"
                                        value="{{ old('email') }}" required />
                                </div>
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted small fw-bold text-uppercase">Password</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i
                                            class="fas fa-lock"></i></span>
                                    <input class="form-control border-start-0 ps-0" type="password" name="password"
                                        placeholder="••••••••" required />
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" id="inputRememberPassword" type="checkbox"
                                        name="remember" />
                                    <label class="form-check-label small text-muted" for="inputRememberPassword">Ingat
                                        Saya</label>
                                </div>
                                <a class="small text-decoration-none fw-bold" href="#">Lupa Password?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 btn-lg fw-bold shadow-sm">
                                <i class="fas fa-sign-in-alt me-1"></i> Masuk Sekarang
                            </button>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3 bg-light border-top-0">
                        <div class="small text-muted">Belum punya akun? <a href="{{ route('register') }}"
                                class="fw-bold text-primary text-decoration-none">Daftar Gratis</a></div>
                    </div>
                </div>
                <div class="text-center mt-3 text-white-50 small">
                    &copy; {{ date('Y') }} Codemy. All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>