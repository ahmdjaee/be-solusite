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
            <span class="badge bg-white text-primary mb-3">Session Locked</span>
            <h1 class="display-5 fw-bold">Your session was locked for security.</h1>
            <p class="lead opacity-75">Enter your password to resume exactly where you left off without losing any work.</p>
          </div>
          <div class="row g-3">
            @foreach ([['Auto', 'Lock policy'], ['AES-256', 'Session enc.'], ['Instant', 'Resume']] as [$value, $label])
              <div class="col-4"><div class="auth-feature"><div class="h3 fw-bold">{{ $value }}</div><div class="small opacity-75">{{ $label }}</div></div></div>
            @endforeach
          </div>
        </section>
        <section class="col-lg-6 d-flex align-items-center justify-content-center p-4">
          <div class="auth-panel w-100">
            <div class="surface p-4 p-md-5">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                  <h1 class="h3 fw-bold mb-1">Session Locked</h1>
                  <div class="text-secondary">Enter your password to continue</div>
                </div>
                <button class="btn btn-outline-primary toolbar-icon" type="button" data-theme-toggle aria-label="Toggle theme"><i class="bi bi-moon-stars"></i></button>
              </div>
              <div class="text-center mb-4">
                <div class="avatar d-inline-flex align-items-center justify-content-center fw-bold mb-3" style="width:72px;height:72px;font-size:1.5rem;">AD</div>
                <div class="fw-semibold">Admin Demo</div>
                <div class="text-secondary small">admin@example.com</div>
              </div>
              <form action="{{ route('dashboard') }}">
                <div class="mb-4">
                  <label class="form-label" for="lock-password">Password</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input class="form-control" id="lock-password" type="password" placeholder="Enter your password" required>
                    <button class="btn btn-outline-primary" type="button" data-password-toggle="#lock-password" aria-label="Show password"><i class="bi bi-eye"></i></button>
                  </div>
                </div>
                <button class="btn btn-primary w-100 mb-3" type="submit"><i class="bi bi-unlock me-1"></i>Unlock</button>
              </form>
              <div class="text-center">
                <a class="text-decoration-none text-secondary small" href="{{ route('login') }}">Not you? Sign out</a>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>
@endsection
