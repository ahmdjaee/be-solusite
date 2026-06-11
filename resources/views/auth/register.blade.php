@extends('layouts.auth')

@section('content')
  <main class="auth-shell d-flex align-items-center justify-content-center p-4">
    <div class="auth-panel w-100">
      <div class="surface p-4 p-md-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <a class="app-brand d-flex align-items-center gap-2 text-decoration-none" href="{{ route('dashboard') }}">
            <span class="brand-mark"><i class="bi bi-grid-1x2-fill"></i></span>
            <span class="brand-copy">Solusite Admin<small>Operations Suite</small></span>
          </a>
          <button class="btn btn-outline-primary toolbar-icon" type="button" data-theme-toggle aria-label="Toggle theme"><i class="bi bi-moon-stars"></i></button>
        </div>
        <h1 class="h3 fw-bold mb-1">Create Account</h1>
        <div class="text-secondary mb-4">Register a new admin user</div>
        <form action="{{ route('dashboard') }}">
          <div class="row g-3">
            <div class="col-md-6"><label class="form-label" for="name">Name</label><input class="form-control" id="name" type="text" placeholder="Full name" required></div>
            <div class="col-md-6"><label class="form-label" for="role">Role</label><select class="form-select" id="role" data-control="select2" data-placeholder="Select role"><option value="admin">Admin</option><option value="editor">Editor</option><option value="support">Support</option><option value="finance">Finance</option></select></div>
            <div class="col-12"><label class="form-label" for="email">Email</label><div class="input-group"><span class="input-group-text"><i class="bi bi-envelope"></i></span><input class="form-control" id="email" type="email" placeholder="name@example.com" required></div></div>
            <div class="col-md-6"><label class="form-label" for="password">Password</label><div class="input-group"><input class="form-control" id="password" type="password" placeholder="Password" required><button class="btn btn-outline-primary" type="button" data-password-toggle="#password" aria-label="Show password"><i class="bi bi-eye"></i></button></div></div>
            <div class="col-md-6"><label class="form-label" for="confirm">Confirm</label><div class="input-group"><input class="form-control" id="confirm" type="password" placeholder="Confirm password" required><button class="btn btn-outline-primary" type="button" data-password-toggle="#confirm" aria-label="Show password"><i class="bi bi-eye"></i></button></div></div>
            <div class="col-12"><label class="form-label">Initial Modules</label><select class="form-select" multiple data-control="select2" data-placeholder="Select modules"><option selected>Dashboard</option><option selected>Orders</option><option>Products</option><option>Reports</option><option>Settings</option></select></div>
          </div>
          <div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" id="terms" required>
            <label class="form-check-label" for="terms">I agree to the internal access policy</label>
          </div>
          <button class="btn btn-primary w-100 mt-4" type="submit"><i class="bi bi-person-plus me-1"></i>Register</button>
        </form>
        <div class="text-center mt-4">Already have an account? <a href="{{ route('login') }}">Login</a></div>
      </div>
    </div>
  </main>
@endsection
