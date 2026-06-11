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
            <span class="badge bg-white text-primary mb-3">Email Verification</span>
            <h1 class="display-5 fw-bold">One quick step to confirm it's you.</h1>
            <p class="lead opacity-75">Check your inbox for the verification link we just sent. It expires in 60 minutes.</p>
          </div>
          <div class="row g-3">
            @foreach ([['60 min', 'Link expiry'], ['Instant', 'Delivery'], ['256-bit', 'Encryption']] as [$value, $label])
              <div class="col-4"><div class="auth-feature"><div class="h3 fw-bold">{{ $value }}</div><div class="small opacity-75">{{ $label }}</div></div></div>
            @endforeach
          </div>
        </section>
        <section class="col-lg-6 d-flex align-items-center justify-content-center p-4">
          <div class="auth-panel w-100">
            <div class="surface p-4 p-md-5">
              <div class="text-center mb-4">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 mb-4" style="width:80px;height:80px;">
                  <i class="bi bi-envelope-check fs-1 text-primary"></i>
                </div>
                <h1 class="h3 fw-bold mb-2">Verify Your Email</h1>
                <div class="text-secondary">We sent a verification link to<br><strong class="text-body">admin@example.com</strong></div>
              </div>
              <button class="btn btn-primary w-100 mb-3" type="button"><i class="bi bi-send me-1"></i>Resend Email</button>
              <div class="text-center mb-3">
                <a class="btn btn-outline-primary w-100" href="{{ route('login') }}">Change Email</a>
              </div>
              <div class="text-center">
                <a class="text-decoration-none text-secondary" href="{{ route('login') }}"><i class="bi bi-arrow-left me-1"></i>Back to Login</a>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>
@endsection
