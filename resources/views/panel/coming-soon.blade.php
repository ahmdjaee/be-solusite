<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Solusite Admin') }} — Coming Soon</title>
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'><rect width='16' height='16' rx='3' fill='%231769e0'/><path d='M3 3h4v4H3zm6 0h4v4H9zM3 9h4v4H3zm6 2h1v2h2v1H9v-3z' fill='%23fff'/></svg>">
  <script>document.documentElement.setAttribute('data-bs-theme', localStorage.getItem('admin-theme') || 'light');</script>
  <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/vendor/bootstrap-icons/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/assets/css/app.css">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: var(--app-bg);
      color: var(--app-text);
      padding: 2rem 1rem;
    }

    .cs-wrap {
      max-width: 540px;
      width: 100%;
      text-align: center;
    }

    .cs-brand {
      margin-bottom: 2.5rem;
    }

    .cs-brand .app-brand {
      display: inline-flex;
      align-items: center;
      gap: 0.625rem;
      text-decoration: none;
    }

    .cs-brand .brand-mark {
      width: 40px;
      height: 40px;
      border-radius: 10px;
      background: var(--app-blue);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 1.125rem;
      flex-shrink: 0;
    }

    .cs-brand .brand-copy {
      font-weight: 700;
      font-size: 1.125rem;
      color: var(--app-text);
      line-height: 1.1;
      display: flex;
      flex-direction: column;
    }

    .cs-brand .brand-copy small {
      font-size: 0.6875rem;
      font-weight: 500;
      color: var(--app-muted);
      text-transform: uppercase;
      letter-spacing: 0.04em;
    }

    .cs-heading {
      font-size: clamp(2.5rem, 8vw, 3.75rem);
      font-weight: 800;
      letter-spacing: -0.03em;
      line-height: 1;
      color: var(--app-text);
      margin-bottom: 0.75rem;
    }

    .cs-heading span {
      color: var(--app-blue);
    }

    .cs-subtext {
      font-size: 1.0625rem;
      color: var(--app-muted);
      margin-bottom: 2.5rem;
      line-height: 1.6;
    }

    .cs-countdown {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-bottom: 2.5rem;
      flex-wrap: wrap;
    }

    .cs-unit {
      background: var(--app-surface);
      border: 1px solid var(--app-border);
      border-radius: 14px;
      padding: 1rem 1.25rem;
      min-width: 80px;
      box-shadow: var(--app-shadow-soft);
    }

    .cs-unit-value {
      font-size: 2rem;
      font-weight: 800;
      color: var(--app-blue);
      line-height: 1;
      display: block;
      letter-spacing: -0.03em;
    }

    .cs-unit-label {
      font-size: 0.6875rem;
      font-weight: 600;
      color: var(--app-muted);
      text-transform: uppercase;
      letter-spacing: 0.06em;
      display: block;
      margin-top: 0.25rem;
    }

    .cs-notify {
      margin-bottom: 2rem;
    }

    .cs-notify .input-group {
      border-radius: 12px;
      overflow: hidden;
      box-shadow: var(--app-shadow-soft);
    }

    .cs-notify .form-control {
      background: var(--app-surface);
      border-color: var(--app-border);
      color: var(--app-text);
      padding: 0.75rem 1rem;
      font-size: 0.9375rem;
    }

    .cs-notify .form-control::placeholder {
      color: var(--app-muted);
    }

    .cs-notify .form-control:focus {
      border-color: var(--app-blue);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, .12);
      background: var(--app-surface);
      color: var(--app-text);
    }

    .cs-notify .btn {
      padding: 0.75rem 1.375rem;
      font-weight: 600;
      font-size: 0.9375rem;
      white-space: nowrap;
    }

    .cs-socials {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.875rem;
    }

    .cs-social-link {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      border: 1px solid var(--app-border);
      background: var(--app-surface);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--app-muted);
      font-size: 1rem;
      text-decoration: none;
      transition: color .15s, border-color .15s, background .15s;
    }

    .cs-social-link:hover {
      color: var(--app-blue);
      border-color: var(--app-blue);
      background: var(--app-blue-soft);
    }
  </style>
</head>
<body>
  <div class="cs-wrap">
    <div class="cs-brand">
      <a class="app-brand" href="/">
        <span class="brand-mark"><i class="bi bi-grid-1x2-fill"></i></span>
        <span class="brand-copy">Solusite Admin<small>Operations Suite</small></span>
      </a>
    </div>

    <h1 class="cs-heading">Coming <span>Soon</span></h1>
    <p class="cs-subtext">We're working on something great. Stay tuned.</p>

    <div class="cs-countdown">
      <div class="cs-unit">
        <span class="cs-unit-value" id="cd-days">00</span>
        <span class="cs-unit-label">Days</span>
      </div>
      <div class="cs-unit">
        <span class="cs-unit-value" id="cd-hours">00</span>
        <span class="cs-unit-label">Hours</span>
      </div>
      <div class="cs-unit">
        <span class="cs-unit-value" id="cd-minutes">00</span>
        <span class="cs-unit-label">Minutes</span>
      </div>
      <div class="cs-unit">
        <span class="cs-unit-value" id="cd-seconds">00</span>
        <span class="cs-unit-label">Seconds</span>
      </div>
    </div>

    <div class="cs-notify">
      <div class="input-group">
        <input type="email" class="form-control" placeholder="Enter your email address">
        <button class="btn btn-primary" type="button">
          <i class="bi bi-bell me-1"></i>Notify Me
        </button>
      </div>
    </div>

    <div class="cs-socials">
      <a href="#" class="cs-social-link" aria-label="X (Twitter)"><i class="bi bi-twitter-x"></i></a>
      <a href="#" class="cs-social-link" aria-label="GitHub"><i class="bi bi-github"></i></a>
      <a href="#" class="cs-social-link" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
    </div>
  </div>

  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/js/app.js"></script>
  <script>
    (function () {
      var target = new Date('2026-09-01T00:00:00').getTime();

      function pad(n) {
        return String(n).padStart(2, '0');
      }

      function tick() {
        var now = Date.now();
        var diff = target - now;

        if (diff <= 0) {
          document.getElementById('cd-days').textContent = '00';
          document.getElementById('cd-hours').textContent = '00';
          document.getElementById('cd-minutes').textContent = '00';
          document.getElementById('cd-seconds').textContent = '00';
          return;
        }

        var days    = Math.floor(diff / 86400000);
        var hours   = Math.floor((diff % 86400000) / 3600000);
        var minutes = Math.floor((diff % 3600000) / 60000);
        var seconds = Math.floor((diff % 60000) / 1000);

        document.getElementById('cd-days').textContent    = pad(days);
        document.getElementById('cd-hours').textContent   = pad(hours);
        document.getElementById('cd-minutes').textContent = pad(minutes);
        document.getElementById('cd-seconds').textContent = pad(seconds);
      }

      tick();
      setInterval(tick, 1000);
    })();
  </script>
</body>
</html>
