@extends('admin.layouts.app')

@section('content')
  <x-metric-grid :metrics="$summary" />

  <x-table-card title="Recent Plans" subtitle="Pricing package terbaru untuk portfolio product digital.">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Highlight</th>
            <th>Created</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($plans as $plan)
            <tr>
              <td class="fw-semibold">{{ $plan->name }}</td>
              <td>Rp {{ number_format((float) $plan->price, 0, ',', '.') }}</td>
              <td><span class="badge {{ $plan->highlight ? 'bg-primary' : 'bg-secondary' }}">{{ $plan->highlight ? 'Yes' : 'No' }}</span></td>
              <td>{{ $plan->created_at?->format('d M Y') }}</td>
            </tr>
          @empty
            <tr><td colspan="4" class="text-center text-secondary py-4">Belum ada plan.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </x-table-card>
@endsection
