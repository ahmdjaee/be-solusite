@extends('layouts.app')

@section('content')
  <x-table-card title="Security Events" subtitle="Chronological security event log">
    <x-slot:actions>
      <button class="btn btn-outline-primary"><i class="bi bi-funnel me-1"></i><span>Filter</span></button>
      <button class="btn btn-primary"><i class="bi bi-download me-1"></i><span>Export</span></button>
    </x-slot:actions>
    <table class="table align-middle" data-table data-per-page="8">
      <thead><tr><th>Time</th><th>Actor</th><th>Event</th><th>IP</th><th>Severity</th><th>Status</th></tr></thead>
      <tbody>
        @foreach ($events as $event)
          <tr>
            <td>{{ $event['time'] }}</td>
            <td>{{ $event['actor'] }}</td>
            <td>{{ $event['event'] }}</td>
            <td>{{ $event['ip'] }}</td>
            <td><x-badge :tone="$event['severity_tone']">{{ $event['severity'] }}</x-badge></td>
            <td><x-status-dot :tone="$event['status_tone']">{{ $event['status'] }}</x-status-dot></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </x-table-card>
@endsection
