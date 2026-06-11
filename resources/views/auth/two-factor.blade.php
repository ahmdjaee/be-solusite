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
            <span class="badge bg-white text-primary mb-3">Two-Factor Authentication</span>
            <h1 class="display-5 fw-bold">An extra layer of security for your account.</h1>
            <p class="lead opacity-75">Open your authenticator app to find the 6-digit code and confirm your identity.</p>
          </div>
          <div class="row g-3">
            @foreach ([['TOTP', 'Standard'], ['30 sec', 'Code window'], ['Zero-trust', 'Policy']] as [$value, $label])
              <div class="col-4"><div class="auth-feature"><div class="h3 fw-bold">{{ $value }}</div><div class="small opacity-75">{{ $label }}</div></div></div>
            @endforeach
          </div>
        </section>
        <section class="col-lg-6 d-flex align-items-center justify-content-center p-4">
          <div class="auth-panel w-100">
            <div class="surface p-4 p-md-5">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                  <h1 class="h3 fw-bold mb-1">Two-Factor Auth</h1>
                  <div class="text-secondary">Enter the 6-digit code from your authenticator app</div>
                </div>
                <button class="btn btn-outline-primary toolbar-icon" type="button" data-theme-toggle aria-label="Toggle theme"><i class="bi bi-moon-stars"></i></button>
              </div>
              <form action="{{ route('dashboard') }}">
                <div class="d-flex gap-2 justify-content-center mb-4">
                  <input class="form-control text-center fw-bold fs-5 p-0 otp-digit" id="otp1" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" autocomplete="one-time-code" style="width:48px;height:56px;" aria-label="Digit 1">
                  <input class="form-control text-center fw-bold fs-5 p-0 otp-digit" id="otp2" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" style="width:48px;height:56px;" aria-label="Digit 2">
                  <input class="form-control text-center fw-bold fs-5 p-0 otp-digit" id="otp3" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" style="width:48px;height:56px;" aria-label="Digit 3">
                  <input class="form-control text-center fw-bold fs-5 p-0 otp-digit" id="otp4" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" style="width:48px;height:56px;" aria-label="Digit 4">
                  <input class="form-control text-center fw-bold fs-5 p-0 otp-digit" id="otp5" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" style="width:48px;height:56px;" aria-label="Digit 5">
                  <input class="form-control text-center fw-bold fs-5 p-0 otp-digit" id="otp6" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" style="width:48px;height:56px;" aria-label="Digit 6">
                </div>
                <button class="btn btn-primary w-100 mb-3" type="submit"><i class="bi bi-shield-check me-1"></i>Verify</button>
              </form>
              <div class="text-center text-secondary small">Lost access to your device? <a class="text-decoration-none" href="{{ route('login') }}">Recovery code</a></div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>

  <script>
    (function () {
      const digits = Array.from(document.querySelectorAll('.otp-digit'));
      digits.forEach(function (input, index) {
        input.addEventListener('keydown', function (e) {
          if (e.key === 'Backspace') {
            if (input.value === '' && index > 0) {
              digits[index - 1].focus();
              digits[index - 1].value = '';
            } else {
              input.value = '';
            }
            e.preventDefault();
          }
        });
        input.addEventListener('input', function () {
          const val = input.value.replace(/\D/g, '');
          input.value = val.slice(-1);
          if (val && index < digits.length - 1) {
            digits[index + 1].focus();
          }
        });
        input.addEventListener('paste', function (e) {
          e.preventDefault();
          const pasted = (e.clipboardData || window.clipboardData).getData('text').replace(/\D/g, '').slice(0, 6);
          pasted.split('').forEach(function (ch, i) {
            if (digits[index + i]) digits[index + i].value = ch;
          });
          const next = digits[Math.min(index + pasted.length, digits.length - 1)];
          if (next) next.focus();
        });
      });
    })();
  </script>
@endsection
