<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Solusite Admin') }} - {{ $title ?? 'Admin' }}</title>
  <script>
    document.documentElement.setAttribute('data-bs-theme', localStorage.getItem('admin-theme') || 'light');
  </script>
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/font/bootstrap-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/simple-datatables/style.css') }}">
  @stack('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
  <div class="app-layout">
    @include('admin.partials.sidebar')
    <div class="sidebar-backdrop"></div>

    <main class="app-main">
      @include('admin.partials.topbar')

      <div class="content-wrap">
        <div class="page-header">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $title ?? 'Panel' }}</li>
            </ol>
          </nav>
          @isset($subtitle)
            <p class="page-subtitle text-secondary small mb-0">{{ $subtitle }}</p>
          @endisset
        </div>

        @yield('content')
      </div>
    </main>
  </div>

  <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1090;">
    @foreach (['success' => 'bi-check-circle-fill', 'error' => 'bi-exclamation-triangle-fill'] as $type => $icon)
      @if (session($type))
        <div class="toast app-toast app-toast--{{ $type }}" role="alert" aria-live="assertive" aria-atomic="true"
             data-bs-delay="4000">
          <div class="toast-body d-flex align-items-start gap-2">
            <i class="bi {{ $icon }} app-toast__icon"></i>
            <div class="flex-fill">{{ session($type) }}</div>
            <button type="button" class="btn-close ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      @endif
    @endforeach
  </div>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
  <script>
    document.querySelectorAll('.toast').forEach(function (el) {
      bootstrap.Toast.getOrCreateInstance(el).show();
    });
  </script>
  @stack('scripts')
</body>
</html>
