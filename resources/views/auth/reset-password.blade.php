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
            <span class="badge bg-white text-primary mb-3">Secure Reset</span>
            <h1 class="display-5 fw-bold">Create a strong new password.</h1>
            <p class="lead opacity-75">Your new password must be at least 12 characters and contain letters, numbers, and a symbol.</p>
          </div>
          <div class="row g-3">
            @foreach ([['12+', 'Min chars'], ['zxcvbn', 'Strength meter'], ['Instant', 'Activation']] as [$value, $label])
              <div class="col-4"><div class="auth-feature"><div class="h3 fw-bold">{{ $value }}</div><div class="small opacity-75">{{ $label }}</div></div></div>
            @endforeach
          </div>
        </section>
        <section class="col-lg-6 d-flex align-items-center justify-content-center p-4">
          <div class="auth-panel w-100">
            <div class="surface p-4 p-md-5">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                  <h1 class="h3 fw-bold mb-1">Reset Password</h1>
                  <div class="text-secondary">Choose a new secure password</div>
                </div>
                <button class="btn btn-outline-primary toolbar-icon" type="button" data-theme-toggle aria-label="Toggle theme"><i class="bi bi-moon-stars"></i></button>
              </div>
              <form action="{{ route('login') }}">
                <input type="hidden" name="token" value="demo-token-abc123">
                <div class="mb-3">
                  <label class="form-label" for="email">Email address</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input class="form-control" id="email" type="email" value="admin@example.com" readonly>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="password">New Password</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input class="form-control" id="password" type="password" placeholder="Minimum 12 characters" required>
                    <button class="btn btn-outline-primary" type="button" data-password-toggle="#password" aria-label="Show password"><i class="bi bi-eye"></i></button>
                  </div>
                  <div class="password-strength mt-2">
                    <div class="password-strength-bar" id="strengthBar"></div>
                  </div>
                  <div class="form-text" id="strengthLabel">Enter a password to check its strength</div>
                </div>
                <div class="mb-4">
                  <label class="form-label" for="password_confirmation">Confirm Password</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input class="form-control" id="password_confirmation" type="password" placeholder="Re-enter password" required>
                    <button class="btn btn-outline-primary" type="button" data-password-toggle="#password_confirmation" aria-label="Show password"><i class="bi bi-eye"></i></button>
                  </div>
                </div>
                <button class="btn btn-primary w-100 mb-3" type="submit"><i class="bi bi-check-lg me-1"></i>Reset Password</button>
              </form>
              <div class="text-center"><a class="text-decoration-none" href="{{ route('login') }}"><i class="bi bi-arrow-left me-1"></i>Back to Login</a></div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>

  <script>
    document.getElementById('password')?.addEventListener('input', function () {
      const val = this.value;
      const bar = document.getElementById('strengthBar');
      const label = document.getElementById('strengthLabel');
      let score = 0;
      if (val.length >= 8) score++;
      if (val.length >= 12) score++;
      if (/[A-Z]/.test(val)) score++;
      if (/[0-9]/.test(val)) score++;
      if (/[^A-Za-z0-9]/.test(val)) score++;
      const levels = [
        { pct: '0%',   color: 'transparent', text: 'Enter a password to check its strength' },
        { pct: '20%',  color: 'var(--app-red)',   text: 'Very weak' },
        { pct: '40%',  color: 'var(--app-amber)', text: 'Weak' },
        { pct: '60%',  color: 'var(--app-amber)', text: 'Fair' },
        { pct: '80%',  color: 'var(--app-green)', text: 'Strong' },
        { pct: '100%', color: 'var(--app-green)', text: 'Very strong' },
      ];
      const lvl = levels[Math.min(score, 5)];
      bar.style.width = lvl.pct;
      bar.style.background = lvl.color;
      label.textContent = lvl.text;
    });
  </script>
@endsection
