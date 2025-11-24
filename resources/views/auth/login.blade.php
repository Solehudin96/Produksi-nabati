<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem Nabati</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background: url("{{ asset('images/pt_nabati.png') }}") no-repeat center center fixed;
        background-size: cover;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Poppins', sans-serif;
        position: relative;
    }

    /* Tambahkan efek overlay transparan agar form lebih jelas di atas gambar */
    body::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(255, 255, 255, 0.5); /* ubah 0.5 → lebih kecil kalau mau lebih transparan */
    }


        .card {
            width: 400px;
            border-radius: 15px;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.15);
        }

        .card-body {
            padding: 2rem;
        }

        .card-body img {
            width: 80px;
        }

        .btn-danger {
            background-color: #e63946;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c71c28;
        }

        .text-danger {
            color: #e63946 !important;
        }

        a.text-danger:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card bg-white">
        <div class="card-body">
            <div class="text-center mb-4">
                <img src="{{ asset('images/nabati.png') }}" alt="Logo" class="mb-3">
                <p class="text-muted">Silakan login untuk melanjutkan</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password" required>
                    @error('password')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-danger fw-bold">Masuk</button>
                </div>

                <div class="text-center">
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none text-muted" href="{{ route('password.request') }}">
                            Lupa kata sandi?
                        </a>
                    @endif
                </div>

                {{-- <div class="text-center mt-3">
                    <small>Belum punya akun?
                        <a href="{{ route('register') }}" class="text-decoration-none text-danger fw-bold">
                            Daftar sekarang
                        </a>
                    </small>
                </div> --}}
            </form>
        </div>
    </div>
</div>

</body>
</html>
