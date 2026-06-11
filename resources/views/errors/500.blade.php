@extends('errors.layout', ['title' => '500 Server Error'])

@section('content')
  <div class="error-code">500</div>
  <div class="error-graphic error-graphic--warning">
    <i class="bi bi-exclamation-triangle"></i>
  </div>
  <h1 class="error-title">Something went wrong</h1>
  <p class="error-description">An unexpected server error occurred. Our team has been notified. Please try again in a few moments.</p>
  <div class="d-flex gap-2 justify-content-center flex-wrap">
    <a class="btn btn-primary" href="{{ route('admin.dashboard') }}"><i class="bi bi-house me-1"></i>Back to Dashboard</a>
    <button class="btn btn-outline-primary" onclick="location.reload()"><i class="bi bi-arrow-clockwise me-1"></i>Retry</button>
  </div>
  <div class="error-brand">
    <a class="app-brand d-inline-flex align-items-center gap-2 text-decoration-none" href="{{ route('admin.dashboard') }}">
      <span class="brand-mark"><i class="bi bi-grid-1x2-fill"></i></span>
      <span class="brand-copy">Solusite Admin<small>Operations Suite</small></span>
    </a>
  </div>
@endsection
