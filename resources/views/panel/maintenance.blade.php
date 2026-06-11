<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Solusite Admin') }} — Under Maintenance</title>
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

    .mt-wrap {
      max-width: 520px;
      width: 100%;
      text-align: center;
    }

    .mt-brand {
      margin-bottom: 2.25rem;
    }

    .mt-brand .app-brand {
      display: inline-flex;
      align-items: center;
      gap: 0.625rem;
      text-decoration: none;
    }

    .mt-brand .brand-mark {
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

    .mt-brand .brand-copy {
      font-weight: 700;
      font-size: 1.125rem;
      color: var(--app-text);
      line-height: 1.1;
      display: flex;
      flex-direction: column;
    }

    .mt-brand .brand-copy small {
      font-size: 0.6875rem;
      font-weight: 500;
      color: var(--app-muted);
      text-transform: uppercase;
      letter-spacing: 0.04em;
    }

    .mt-icon-wrap {
      width: 96px;
      height: 96px;
      border-radius: 50%;
      background: var(--app-blue-soft);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.75rem;
    }

    .mt-icon-wrap i {
      font-size: 2.75rem;
      color: var(--app-blue);
      display: block;
      line-height: 1;
    }

    .mt-heading {
      font-size: clamp(1.875rem, 6vw, 2.75rem);
      font-weight: 800;
      letter-spacing: -0.03em;
      color: var(--app-text);
      margin-bottom: 0.75rem;
    }

    .mt-subtext {
      font-size: 1rem;
      color: var(--app-muted);
      line-height: 1.65;
      margin-bottom: 2rem;
    }

    .mt-progress-wrap {
      background: var(--app-surface);
      border: 1px solid var(--app-border);
      border-radius: 14px;
      padding: 1.25rem 1.5rem;
      margin-bottom: 1.5rem;
      text-align: left;
      box-shadow: var(--app-shadow-soft);
    }

    .mt-progress-label {
      font-size: 0.875rem;
      font-weight: 600;
      color: var(--app-text);
      margin-bottom: 0.625rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .mt-progress-label span {
      color: var(--app-blue);
      font-size: 0.8125rem;
    }

    .progress {
      height: 8px;
      border-radius: 99px;
      background: var(--app-surface-3);
    }

    .progress-bar {
      border-radius: 99px;
      background: var(--app-blue);
    }

    .mt-status-card {
      background: var(--app-surface);
      border: 1px solid var(--app-border);
      border-radius: 14px;
      padding: 1.125rem 1.5rem;
      margin-bottom: 1.5rem;
      text-align: left;
      box-shadow: var(--app-shadow-soft);
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
    }

    .mt-status-row {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      font-size: 0.9375rem;
    }

    .mt-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      flex-shrink: 0;
    }

    .mt-dot-green  { background: var(--app-green); }
    .mt-dot-amber  { background: var(--app-amber); }
    .mt-dot-blue   { background: var(--app-blue); }

    .mt-status-label {
      flex: 1;
      color: var(--app-text);
      font-weight: 500;
    }

    .mt-status-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.3rem;
      font-size: 0.8125rem;
      font-weight: 600;
      padding: 0.2rem 0.625rem;
      border-radius: 99px;
    }

    .mt-status-badge.complete {
      color: var(--app-green);
      background: rgba(5, 150, 105, .12);
    }

    .mt-status-badge.in-progress {
      color: var(--app-amber);
      background: rgba(180, 83, 9, .10);
    }

    .mt-status-badge.pending {
      color: var(--app-blue);
      background: var(--app-blue-soft);
    }

    .mt-eta {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      font-size: 0.875rem;
      font-weight: 600;
      color: var(--app-muted);
      background: var(--app-surface);
      border: 1px solid var(--app-border);
      border-radius: 99px;
      padding: 0.375rem 1rem;
      margin-bottom: 1.75rem;
    }

    .mt-eta i {
      color: var(--app-blue);
      font-size: 0.9375rem;
    }
  </style>
</head>
<body>
  <div class="mt-wrap">
    <div class="mt-brand">
      <a class="app-brand" href="/">
        <span class="brand-mark"><i class="bi bi-grid-1x2-fill"></i></span>
        <span class="brand-copy">Solusite Admin<small>Operations Suite</small></span>
      </a>
    </div>

    <div class="mt-icon-wrap">
      <i class="bi bi-gear-wide-connected"></i>
    </div>

    <h1 class="mt-heading">Under Maintenance</h1>
    <p class="mt-subtext">We're performing scheduled maintenance to improve the system. We'll be back shortly.</p>

    <div class="mt-progress-wrap">
      <div class="mt-progress-label">
        System restoration <span>72%</span>
      </div>
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>

    <div class="mt-status-card">
      <div class="mt-status-row">
        <span class="mt-dot mt-dot-green"></span>
        <span class="mt-status-label">Database backup</span>
        <span class="mt-status-badge complete"><i class="bi bi-check-circle-fill"></i> Complete</span>
      </div>
      <div class="mt-status-row">
        <span class="mt-dot mt-dot-amber"></span>
        <span class="mt-status-label">Service migration</span>
        <span class="mt-status-badge in-progress"><i class="bi bi-arrow-repeat"></i> In Progress</span>
      </div>
      <div class="mt-status-row">
        <span class="mt-dot mt-dot-blue"></span>
        <span class="mt-status-label">Cache warm-up</span>
        <span class="mt-status-badge pending"><i class="bi bi-clock"></i> Pending</span>
      </div>
    </div>

    <div class="mt-eta">
      <i class="bi bi-alarm"></i>
      Expected back: 14:00 UTC
    </div>

    <div>
      <button class="btn btn-outline-primary px-4" onclick="location.reload()">
        <i class="bi bi-arrow-clockwise me-1"></i>Check Status
      </button>
    </div>
  </div>

  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/js/app.js"></script>
</body>
</html>
