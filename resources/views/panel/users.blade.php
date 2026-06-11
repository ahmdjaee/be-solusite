@extends('layouts.app')

@section('content')
  <x-metric-grid :metrics="$metrics" />

  <x-filter-bar>
    @foreach ([
      'Role' => ['All roles', 'Admin', 'Editor', 'Support', 'Finance'],
      'Status' => ['All statuses', 'Active', 'Pending', 'Locked'],
      'Team' => ['All teams', 'Operations', 'Finance', 'Customer Success'],
    ] as $label => $options)
      <div>
        <label class="form-label small fw-bold">{{ $label }}</label>
        <select class="form-select" data-control="select2">
          @foreach ($options as $option)
            <option @selected($loop->first)>{{ $option }}</option>
          @endforeach
        </select>
      </div>
    @endforeach
    <div class="d-flex align-items-end gap-2">
      <button class="btn btn-primary flex-fill"><i class="bi bi-funnel me-1"></i>Apply</button>
      <button class="btn btn-outline-primary toolbar-icon" aria-label="Reset filter"><i class="bi bi-arrow-counterclockwise"></i></button>
    </div>
  </x-filter-bar>

  <x-table-card title="Team Directory" subtitle="Manage internal accounts and access rights">
    <x-slot:actions>
      <button class="btn btn-outline-primary"><i class="bi bi-upload me-1"></i><span>Import</span></button>
      <button class="btn btn-outline-primary"><i class="bi bi-envelope me-1"></i><span>Send Invite</span></button>
      <a class="btn btn-outline-primary" href="{{ route('roles') }}"><i class="bi bi-shield-lock me-1"></i><span>Roles</span></a>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal"><i class="bi bi-person-plus me-1"></i><span>User</span></button>
    </x-slot:actions>
    <table class="table align-middle" data-table data-per-page="8">
      <thead><tr><th>User</th><th>Email</th><th>Role</th><th>Team</th><th>Status</th><th>Last Login</th><th class="no-sort">Actions</th></tr></thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td><span class="avatar me-2">{{ $user['initials'] }}</span><strong>{{ $user['name'] }}</strong></td>
            <td>{{ $user['email'] }}</td>
            <td>{{ $user['role'] }}</td>
            <td>{{ $user['team'] }}</td>
            <td><x-status-dot :tone="$user['status_tone']">{{ $user['status'] }}</x-status-dot></td>
            <td>{{ $user['last_login'] }}</td>
            <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn"><i class="bi bi-pencil"></i></button><button class="btn btn-sm btn-outline-primary action-btn"><i class="bi bi-key"></i></button></span></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </x-table-card>
@endsection

@push('modals')
  @include('panel.partials.user-modal')
@endpush
