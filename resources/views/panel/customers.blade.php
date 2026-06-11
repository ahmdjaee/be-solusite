@extends('layouts.app')

@section('content')
  <x-metric-grid :metrics="$metrics" />

  <x-filter-bar>
    @foreach ([
      'Segment' => ['All segments', 'Enterprise', 'Growth', 'SMB', 'Marketplace'],
      'Health' => ['All health states', 'Healthy', 'Watch', 'At Risk'],
      'Owner' => ['All owners', 'Dewi', 'Andy', 'Sinta', 'Budi'],
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

  <div class="surface p-3 p-md-4 mb-3">
    <div class="d-flex flex-wrap justify-content-between gap-2 align-items-center mb-3">
      <div>
        <h2 class="h5 fw-bold mb-1">Retention Playbook</h2>
        <div class="small text-secondary">Priority customer success actions this week</div>
      </div>
      <x-badge tone="success">Live</x-badge>
    </div>
    <div class="playbook-grid">
      @foreach ([['Renewal Queue', 72], ['QBR Completed', 58], ['Risk Recovery', 34], ['Expansion Ready', 46]] as [$label, $percent])
        <div>
          <div class="d-flex justify-content-between small mb-1"><span>{{ $label }}</span><strong>{{ $percent }}%</strong></div>
          <div class="progress-thin"><span style="width: {{ $percent }}%"></span></div>
        </div>
      @endforeach
    </div>
    <div class="small text-secondary mt-3">This week's focus: marketplace accounts with high refunds and delayed onboarding.</div>
  </div>

  <x-table-card title="Customer Health" subtitle="Priority accounts with MRR, owner, and next action">
    <x-slot:actions>
      <button class="btn btn-outline-primary"><i class="bi bi-upload me-1"></i><span>Import</span></button>
      <button class="btn btn-outline-primary"><i class="bi bi-kanban me-1"></i><span>Pipeline</span></button>
      <button class="btn btn-outline-primary"><i class="bi bi-download me-1"></i><span>Export</span></button>
      <button class="btn btn-primary"><i class="bi bi-person-plus me-1"></i><span>Customer</span></button>
    </x-slot:actions>
    <table class="table align-middle" data-table data-per-page="8">
      <thead><tr><th>Customer</th><th>Segment</th><th>Health</th><th>Owner</th><th>MRR</th><th>Last Contact</th><th>Next Action</th></tr></thead>
      <tbody>
        @foreach ($customers as $customer)
          <tr>
            <td><strong>{{ $customer['name'] }}</strong></td>
            <td>{{ $customer['segment'] }}</td>
            <td><x-badge :tone="$customer['health_tone']">{{ $customer['health'] }}</x-badge></td>
            <td>{{ $customer['owner'] }}</td>
            <td>{{ $customer['mrr'] }}</td>
            <td>{{ $customer['last_contact'] }}</td>
            <td>{{ $customer['next_action'] }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </x-table-card>
@endsection
