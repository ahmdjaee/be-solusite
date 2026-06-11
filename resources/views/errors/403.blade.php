@extends('errors.layout', ['title' => '403 Forbidden'])

@section('content')
  <div class="error-code">403</div>
  <div class="error-graphic">
    <i class="bi bi-ban"></i>
  </div>
  <h1 class="error-title">Access Denied</h1>
  <p class="error-description">You don't have permission to access this page. Contact your administrator if you believe this is a mistake.</p>
  <div class="d-flex gap-2 justify-content-center flex-wrap">
    <a class="btn btn-primary" href="{{ route('admin.dashboard') }}"><i class="bi bi-house me-1"></i>Back to Dashboard</a>
    <button class="btn btn-outline-primary" onclick="history.back()"><i class="bi bi-arrow-left me-1"></i>Go Back</button>
  </div>
  <div class="error-brand">
    <a class="app-brand d-inline-flex align-items-center gap-2 text-decoration-none" href="{{ route('admin.dashboard') }}">
      <span class="brand-mark"><i class="bi bi-grid-1x2-fill"></i></span>
      <span class="brand-copy">Solusite Admin<small>Operations Suite</small></span>
    </a>
  </div>
@endsection
