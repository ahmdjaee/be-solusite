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

        @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if (session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @yield('content')
      </div>
    </main>
  </div>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
