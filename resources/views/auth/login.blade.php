<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
  <div class="row min-vh-100">

    <!-- Bagian Kiri (Gambar) -->
    <div class="col-lg-8 col-md-7 col-12 d-flex flex-column justify-content-start align-items-start text-dark p-5"
         style="background-image: url('./assets/R.jpeg'); background-size: cover; background-position: center;">
      <div class="mt-3">
        <h1 class="display-4 fw-bold">Welcome</h1>
        <p class="fs-3 fw-semibold">Live your life to the fullest</p>
      </div>
    </div>

    <!-- Bagian Kanan (Login) -->
    <div class="col-lg-4 col-md-5 col-12 d-flex justify-content-center align-items-center bg-light text-dark py-5">
      <div class="w-75">
        <h2 class="fs-1 text-center mb-1">Log-in</h2>
        <h6 class="fs-5 text-center mb-5">GreenWiyata</h6>

        {{-- Pesan sukses dari session --}}
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Validasi error --}}
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
          @csrf

        {{-- tampilkan error kalau ada --}}
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        {{-- form login --}}
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
          </div>
          <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="current-password">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <input type="checkbox" class="form-check-input" name="remember" id="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
            <span class="ms-2">Don’t Have an account? <a href="{{ route('register') }}" class="text-info">Register</a></span>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-success">Masuk</button>
          </div>
          <p class="mt-3 text-center">
            Don't have an account? <a href="{{ route('register') }}" class="text-info">Register here</a>
          </p>
        </form>
      </div>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
