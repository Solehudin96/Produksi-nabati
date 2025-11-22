<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Akun - Sistem Nabati</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #fff, #e6e6e6);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
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
                <p class="text-muted">Buat akun baru untuk masuk ke sistem</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input id="name" type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required>
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

                <div class="mb-4">
                    <label for="password-confirm" class="form-label">Konfirmasi Kata Sandi</label>
                    <input id="password-confirm" type="password"
                        class="form-control" name="password_confirmation" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-danger fw-bold">
                        Daftar Sekarang
                    </button>
                </div>

                <div class="text-center mt-3">
                    <small>Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-decoration-none text-danger fw-bold">
                            Masuk di sini
                        </a>
                    </small>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
