<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - Codemy</title>
    <link href="{{ asset('startbootstrap-sb-admin-gh-pages/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{route('register')}}">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('name') is-invalid @enderror"
                                                id="inputName" type="text" name="name" placeholder="Enter your name"
                                                value="{{ old('name') }}" />
                                            <label for="inputName">Full Name</label>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('occupation') is-invalid @enderror"
                                                id="inputOccupation" name="occupation">
                                                <option selected disabled value="">Pekerjaan.</option>
                                                <option value="Pelajar" {{ old('occupation') == 'Pelajar' ? 'selected' : '' }}>Pelajar</option>
                                                <option value="Mahasiswa" {{ old('occupation') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                                <option value="Developer" {{ old('occupation') == 'Developer' ? 'selected' : '' }}>Developer</option>
                                                <option value="Dosen/Guru" {{ old('occupation') == 'Dosen/Guru' ? 'selected' : '' }}>Dosen/Guru</option>
                                                <option value="Designer" {{ old('occupation') == 'Designer' ? 'selected' : '' }}>Designer</option>
                                                <option value="Lainya" {{ old('occupation') == 'Lainya' ? 'selected' : '' }}>Lainya</option>
                                            </select>
                                            {{-- <label for="inputOccupation">Occupation</label> --}}
                                            @error('occupation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('email') is-invalid @enderror"
                                                id="inputEmail" type="email" name="email" placeholder="name@example.com"
                                                value="{{ old('email') }}" />
                                            <label for="inputEmail">Alamat email</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                id="inputPassword" type="password" name="password"
                                                placeholder="Create a password" />
                                            <label for="inputPassword">Password</label>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPasswordConfirm" type="password"
                                                name="password_confirmation" placeholder="Confirm password" />
                                            <label for="inputPasswordConfirm">Konfimasi Password</label>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button class="btn btn-primary btn-block"
                                                    type="submit">Buat Akun</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="{{route('login')}}">Sudah punya akun? Login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('startbootstrap-sb-admin-gh-pages/js/scripts.js') }}"></script>
</body>

</html>