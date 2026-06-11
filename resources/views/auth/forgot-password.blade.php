@extends('layouts.auth')

@section('content')
  <main class="auth-shell">
    <div class="container-fluid">
      <div class="row min-vh-100">
        <section class="col-lg-6 auth-visual d-none d-lg-flex flex-column justify-content-between p-5">
          <a class="app-brand d-flex align-items-center gap-2 text-white text-decoration-none" href="{{ route('dashboard') }}">
            <span class="brand-mark bg-white text-primary"><i class="bi bi-grid-1x2-fill"></i></span>
            <span class="brand-copy">Solusite Admin<small class="text-white-50">Operations Suite</small></span>
          </a>
          <div>
            <span class="badge bg-white text-primary mb-3">Account Recovery</span>
            <h1 class="display-5 fw-bold">Locked out? We'll get you back in.</h1>
            <p class="lead opacity-75">Enter your email and we will send a secure password reset link valid for 60 minutes.</p>
          </div>
          <div class="row g-3">
            @foreach ([['256-bit', 'Encryption'], ['60 min', 'Link expiry'], ['Instant', 'Delivery']] as [$value, $label])
              <div class="col-4"><div class="auth-feature"><div class="h3 fw-bold">{{ $value }}</div><div class="small opacity-75">{{ $label }}</div></div></div>
            @endforeach
          </div>
        </section>
        <section class="col-lg-6 d-flex align-items-center justify-content-center p-4">
          <div class="auth-panel w-100">
            <div class="surface p-4 p-md-5">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                  <h1 class="h3 fw-bold mb-1">Forgot Password</h1>
                  <div class="text-secondary">We'll email you a reset link</div>
                </div>
                <button class="btn btn-outline-primary toolbar-icon" type="button" data-theme-toggle aria-label="Toggle theme"><i class="bi bi-moon-stars"></i></button>
              </div>

              <div class="alert alert-info d-flex gap-2 align-items-center mb-4 py-2" role="alert">
                <i class="bi bi-info-circle-fill flex-shrink-0"></i>
                <div class="small">Check your spam folder if the email does not arrive within 2 minutes.</div>
              </div>

              <form action="{{ route('reset-password') }}">
                <div class="mb-4">
                  <label class="form-label" for="email">Email address</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input class="form-control" id="email" type="email" placeholder="admin@example.com" required>
                  </div>
                </div>
                <button class="btn btn-primary w-100 mb-3" type="submit"><i class="bi bi-send me-1"></i>Send Reset Link</button>
              </form>
              <div class="text-center"><a class="text-decoration-none" href="{{ route('login') }}"><i class="bi bi-arrow-left me-1"></i>Back to Login</a></div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>
@endsection
