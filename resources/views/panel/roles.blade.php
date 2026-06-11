@extends('layouts.app')

@section('content')
  <x-metric-grid :metrics="$metrics" columns="col-md-4" />

  <div class="surface p-3 p-md-4">
    <div class="d-flex flex-wrap justify-content-between gap-2 align-items-center mb-3">
      <div><h2 class="h5 fw-bold mb-1">Permission Matrix</h2><div class="small text-secondary">Toggle access rights for Admin, Manager, Editor, and Support</div></div>
      <div class="page-actions">
        <button class="btn btn-outline-primary"><i class="bi bi-shield-check me-1"></i><span>Audit Policy</span></button>
        <button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i><span>Role</span></button>
      </div>
    </div>
    <div class="permission-grid">
      <div class="permission-row fw-bold text-secondary"><div>Module</div><div>Admin</div><div>Manager</div><div>Editor</div><div>Support</div></div>
      @foreach ($permissions as $permission)
        <div class="permission-row">
          <div><strong>{{ $permission['module'] }}</strong><div class="small text-secondary">{{ $permission['description'] }}</div></div>
          @foreach ($permission['access'] as $allowed)
            <div><input class="form-check-input" type="checkbox" @checked($allowed)></div>
          @endforeach
        </div>
      @endforeach
    </div>
  </div>
@endsection
