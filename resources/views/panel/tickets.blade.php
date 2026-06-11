@extends('layouts.app')

@section('content')
  <x-metric-grid :metrics="$metrics" />

  <div class="ticket-board mb-3">
    @foreach ($ticketLanes as $lane)
      <div class="ticket-lane">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <strong>{{ $lane['label'] }}</strong>
          <x-badge :tone="$lane['tone']">{{ $lane['count'] }}</x-badge>
        </div>
        <div class="d-grid gap-2">
          @foreach ($lane['items'] as $item)
            <div class="surface-plain p-2 small">{{ $item }}</div>
          @endforeach
        </div>
      </div>
    @endforeach
  </div>

  <x-table-card title="Ticket Queue" subtitle="Support priority, remaining SLA, and owner">
    <x-slot:actions>
      <button class="btn btn-outline-primary"><i class="bi bi-headset me-1"></i><span>Assign</span></button>
      <button class="btn btn-outline-primary"><i class="bi bi-funnel me-1"></i><span>Filter</span></button>
      <button class="btn btn-outline-primary"><i class="bi bi-download me-1"></i><span>Export</span></button>
      <button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i><span>Ticket</span></button>
    </x-slot:actions>
    <table class="table align-middle" data-table data-per-page="8">
      <thead><tr><th>Ticket</th><th>Subject</th><th>Customer</th><th>Priority</th><th>Status</th><th>Owner</th><th>SLA</th></tr></thead>
      <tbody>
        @foreach ($tickets as $ticket)
          <tr>
            <td><strong>{{ $ticket['id'] }}</strong></td>
            <td>{{ $ticket['subject'] }}</td>
            <td>{{ $ticket['customer'] }}</td>
            <td><x-badge :tone="$ticket['badge']">{{ $ticket['priority'] }}</x-badge></td>
            <td>{{ $ticket['status'] }}</td>
            <td>{{ $ticket['owner'] }}</td>
            <td>{{ $ticket['sla'] }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </x-table-card>
@endsection
