@extends('layouts.app')

@section('content')
  <x-metric-grid :metrics="$metrics" />

  <x-filter-bar>
    @foreach ([
      'Status' => ['All statuses', 'Paid', 'Packed', 'Shipped', 'Hold'],
      'Channel' => ['All channels', 'Website', 'Marketplace', 'Retail'],
      'Courier' => ['All couriers', 'JNE', 'SiCepat', 'Instant'],
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

  <x-table-card title="Order Queue" subtitle="Cross-channel transaction monitoring">
    <x-slot:actions>
      <button class="btn btn-outline-primary"><i class="bi bi-printer me-1"></i><span>Label</span></button>
      <button class="btn btn-outline-primary"><i class="bi bi-truck me-1"></i><span>Pickup</span></button>
      <button class="btn btn-outline-primary"><i class="bi bi-download me-1"></i><span>Export</span></button>
      <button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i><span>Order</span></button>
    </x-slot:actions>
    <table class="table align-middle" data-table data-per-page="8">
      <thead><tr><th>Order</th><th>Customer</th><th>Status</th><th>Payment</th><th>Courier</th><th>Total</th><th class="no-sort">Actions</th></tr></thead>
      <tbody>
        @foreach ($orders as $order)
          <tr>
            <td><strong>{{ $order['id'] }}</strong><div class="small text-secondary">{{ $order['date'] }}</div></td>
            <td>{{ $order['customer'] }}<div class="small text-secondary">{{ $order['channel'] }}</div></td>
            <td><x-badge :tone="$order['badge']">{{ $order['status'] }}</x-badge></td>
            <td>{{ $order['payment'] }}</td>
            <td>{{ $order['courier'] }}</td>
            <td>{{ $order['total'] }}</td>
            <td>
              <span class="action-stack">
                <button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button>
                <button class="btn btn-sm btn-outline-primary action-btn" aria-label="Print"><i class="bi bi-printer"></i></button>
              </span>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </x-table-card>
@endsection
