<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Register to Codemy" />
    <meta name="author" content="Codemy" />
    <title>Daftar - Codemy</title>
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
            <div class="col-lg-7 col-md-9">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success rounded-circle mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-user-plus fa-2x"></i>
                        </div>
                        <h3 class="fw-bold text-dark">Buat Akun Baru</h3>
                        <p class="text-muted small">Gabung komunitas kami dan mulai belajar sekarang.</p>
                    </div>
                    <div class="card-body p-4 pt-2">
                        <form method="POST" action="{{route('register')}}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted small fw-bold text-uppercase">Nama
                                        Lengkap</label>
                                    <input class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        id="inputName" type="text" name="name" placeholder="Nama Anda"
                                        value="{{ old('name') }}" required />
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted small fw-bold text-uppercase">Pekerjaan</label>
                                    <select class="form-select form-select-lg @error('occupation') is-invalid @enderror"
                                        id="inputOccupation" name="occupation" required>
                                        <option selected disabled value="">Pilih...</option>
                                        <option value="Pelajar" {{ old('occupation') == 'Pelajar' ? 'selected' : '' }}>
                                            Pelajar</option>
                                        <option value="Mahasiswa" {{ old('occupation') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                        <option value="Developer" {{ old('occupation') == 'Developer' ? 'selected' : '' }}>Developer</option>
                                        <option value="Dosen/Guru" {{ old('occupation') == 'Dosen/Guru' ? 'selected' : '' }}>Dosen/Guru</option>
                                        <option value="Designer" {{ old('occupation') == 'Designer' ? 'selected' : '' }}>
                                            Designer</option>
                                        <option value="Lainya" {{ old('occupation') == 'Lainya' ? 'selected' : '' }}>
                                            Lainnya</option>
                                    </select>
                                    @error('occupation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted small fw-bold text-uppercase">Email</label>
                                <input class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    id="inputEmail" type="email" name="email" placeholder="nama@email.com"
                                    value="{{ old('email') }}" required />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted small fw-bold text-uppercase">Password</label>
                                    <input class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        id="inputPassword" type="password" name="password"
                                        placeholder="Minimal 8 karakter" required />
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted small fw-bold text-uppercase">Konfirmasi
                                        Password</label>
                                    <input class="form-control form-control-lg" id="inputPasswordConfirm"
                                        type="password" name="password_confirmation" placeholder="Ulangi password"
                                        required />
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <button class="btn btn-primary btn-lg fw-bold shadow-sm" type="submit">
                                    <i class="fas fa-paper-plane me-1"></i> Daftar Sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3 bg-light border-top-0">
                        <div class="small text-muted">Sudah punya akun? <a href="{{route('login')}}"
                                class="fw-bold text-primary text-decoration-none">Masuk Saja</a></div>
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