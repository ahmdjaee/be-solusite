@extends('layouts.app')

@section('content')
  <x-metric-grid :metrics="$metrics" />

  <div class="row g-3 mb-3">
    <div class="col-xl-8">
      <x-chart-bars :chart="$chart">
        <x-slot:actions>
          <select class="form-select" style="max-width: 180px" data-control="select2" data-placeholder="Period">
            <option selected>2026</option>
            <option>2025</option>
            <option>This Quarter</option>
          </select>
        </x-slot:actions>
      </x-chart-bars>
    </div>
    <div class="col-xl-4">
      <div class="surface p-3 h-100 d-flex flex-column">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h2 class="h5 fw-bold mb-0">Command Center</h2>
          <x-badge>Live</x-badge>
        </div>
        <div class="d-flex flex-column gap-2 mb-3">
          @foreach ($quickActions as $action)
            <a class="quick-action" href="{{ route($action['route']) }}">
              <span class="icon-box {{ $action['tone'] ?? '' }} shrink-0"><i class="bi {{ $action['icon'] }}"></i></span>
              <div class="d-flex justify-content-between align-items-center w-100 min-w-0 gap-2">
                <span class="fw-semibold">{{ $action['label'] }}</span>
                <span class="text-secondary small text-nowrap">{{ $action['description'] }}</span>
              </div>
            </a>
          @endforeach
        </div>
        <div class="timeline mt-auto">
          @foreach ($timeline as $event)
            <div class="timeline-item">
              <span class="timeline-icon"><i class="bi {{ $event['icon'] }}"></i></span>
              <div><strong>{{ $event['title'] }}</strong><div class="small text-secondary">{{ $event['description'] }}</div></div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  {{-- Donut + Sparklines row --}}
  <div class="row g-3 mb-3">
    <div class="col-xl-6">
      <div class="surface p-3 h-100">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h2 class="h5 fw-bold mb-0">Revenue by Channel</h2>
          <x-badge tone="info">Apr 2026</x-badge>
        </div>
        <div style="position:relative;height:220px">
          <canvas data-chart="{{ json_encode([
            'type'     => 'doughnut',
            'labels'   => collect($donut)->pluck('label')->values()->toArray(),
            'datasets' => [[
              'data'   => collect($donut)->pluck('value')->values()->toArray(),
              'colors' => collect($donut)->pluck('color')->values()->toArray(),
            ]],
            'legend'   => true,
          ]) }}"></canvas>
        </div>
      </div>
    </div>
    <div class="col-xl-6">
      <div class="surface p-3 h-100">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h2 class="h5 fw-bold mb-0">KPI Pulse</h2>
          <x-badge>Live</x-badge>
        </div>
        @foreach ($sparklines as $kpi)
          <div class="mb-3">
            <div class="d-flex justify-content-between small mb-1">
              <span>{{ $kpi['label'] }}</span>
              <strong>{{ $kpi['pct'] }}%</strong>
            </div>
            <div class="progress" style="height:6px">
              <div class="progress-bar {{ $kpi['pct'] >= 90 ? 'bg-success' : ($kpi['pct'] >= 75 ? 'bg-primary' : 'bg-warning') }}"
                   style="width:{{ $kpi['pct'] }}%" role="progressbar"
                   aria-valuenow="{{ $kpi['pct'] }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <x-table-card title="Recent Orders" subtitle="Latest orders from every channel">
    <x-slot:actions>
      <button class="btn btn-outline-primary"><i class="bi bi-funnel me-1"></i><span>Filter</span></button>
      <a class="btn btn-primary" href="{{ route('orders') }}"><i class="bi bi-arrow-right me-1"></i><span>View All</span></a>
    </x-slot:actions>
    <table class="table align-middle" data-table data-per-page="5">
      <thead>
        <tr><th>Order</th><th>Customer</th><th>Channel</th><th>Status</th><th>Total</th><th>Owner</th></tr>
      </thead>
      <tbody>
        @foreach ($recentOrders as $order)
          <tr>
            <td><strong>{{ $order['id'] }}</strong><div class="small text-secondary">{{ preg_replace('/ \d{2}:\d{2}$/', '', $order['date']) }}</div></td>
            <td>{{ $order['customer'] }}</td>
            <td>{{ $order['channel'] }}</td>
            <td><x-badge :tone="$order['badge']">{{ $order['status'] }}</x-badge></td>
            <td>{{ $order['total'] }}</td>
            <td><span class="avatar avatar-sm me-1">{{ $order['avatar'] }}</span>{{ $order['owner'] }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </x-table-card>
@endsection
