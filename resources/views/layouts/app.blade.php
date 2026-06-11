<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Solusite Admin') }} - {{ $title ?? 'Panel' }}</title>
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'><rect width='16' height='16' rx='3' fill='%231769e0'/><path d='M3 3h4v4H3zm6 0h4v4H9zM3 9h4v4H3zm6 2h1v2h2v1H9v-3z' fill='%23fff'/></svg>">
  <script>
    document.documentElement.setAttribute('data-bs-theme', localStorage.getItem('admin-theme') || 'light');
  </script>
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/font/bootstrap-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/simple-datatables/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
  <div class="app-layout">
    @include('partials.sidebar')
    <div class="sidebar-backdrop"></div>

    <main class="app-main">
      @include('partials.topbar')

      <div class="content-wrap">
        <div class="page-header">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              @yield('breadcrumb')
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

  @stack('modals')
  <div class="toast-stack" id="toastStack"></div>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/chartjs/chart.umd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/fullcalendar/index.global.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/sortablejs/Sortable.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
