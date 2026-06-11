@extends('layouts.auth')

@section('content')
  <main class="auth-shell">
    <div class="container-fluid">
      <div class="row min-vh-100">
        <section class="col-lg-6 auth-visual d-none d-lg-flex flex-column justify-content-between p-5">
          <a class="app-brand d-flex align-items-center gap-2 text-white text-decoration-none" href="{{ route('admin.dashboard') }}">
            <span class="brand-mark bg-white text-primary"><i class="bi bi-grid-1x2-fill"></i></span>
            <span class="brand-copy">Solusite Admin<small class="text-white-50">Digital Product Suite</small></span>
          </a>
          <div>
            <span class="badge bg-white text-primary mb-3">Portfolio Product Digital</span>
            <h1 class="display-5 fw-bold">Kelola produk, jasa, portfolio, pricing, dan promo dari satu panel.</h1>
            <p class="lead opacity-75">Admin panel fokus untuk katalog aplikasi digital dan source code.</p>
          </div>
          <div class="row g-3">
            @foreach ([['99.9%', 'Uptime'], ['124ms', 'API avg'], ['24/7', 'Ops']] as [$value, $label])
              <div class="col-4"><div class="auth-feature"><div class="h3 fw-bold">{{ $value }}</div><div class="small opacity-75">{{ $label }}</div></div></div>
            @endforeach
          </div>
        </section>
        <section class="col-lg-6 d-flex align-items-center justify-content-center p-4">
          <div class="auth-panel w-100">
            <div class="surface p-4 p-md-5">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                  <h1 class="h3 fw-bold mb-1">Sign In</h1>
                  <div class="text-secondary">Use your admin account</div>
                </div>
                <button class="btn btn-outline-primary toolbar-icon" type="button" data-theme-toggle aria-label="Toggle theme"><i class="bi bi-moon-stars"></i></button>
              </div>
              @if ($errors->any())
                <div class="alert alert-danger">Periksa kembali email dan password.</div>
              @endif
              <form action="{{ route('login.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label class="form-label" for="email">Email</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email', 'admin@solusite.test') }}" placeholder="admin@solusite.test" required>
                  </div>
                  @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="password" required>
                    <button class="btn btn-outline-primary" type="button" data-password-toggle="#password" aria-label="Show password"><i class="bi bi-eye"></i></button>
                  </div>
                  @error('password')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div class="form-check"><input class="form-check-input" type="checkbox" id="remember" name="remember" value="1" @checked(old('remember'))><label class="form-check-label" for="remember">Remember me</label></div>
                  <span class="text-secondary small">admin@solusite.test</span>
                </div>
                <button class="btn btn-primary w-100" type="submit"><i class="bi bi-box-arrow-in-right me-1"></i>Login</button>
              </form>
              <div class="text-center text-secondary mt-4">Default password: password</div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>
@endsection
