@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Plans" subtitle="Paket pricing untuk penawaran produk digital.">
    <x-slot:actions>
      <a class="btn btn-primary" href="{{ route('admin.plans.create') }}"><i class="bi bi-plus-lg me-1"></i>Create</a>
    </x-slot:actions>

    <div class="table-responsive">
      <table class="table align-middle mb-0" data-table data-per-page="10" data-table-reorder="{{ route('admin.plans.reorder') }}">
        <thead><tr><th class="table-reorder-column" data-sortable="false" aria-label="Order"></th><th data-sortable="false">Name</th><th data-sortable="false">Price</th><th data-sortable="false">Highlight</th><th data-sortable="false">Features</th><th class="text-end" data-sortable="false">Actions</th></tr></thead>
        <tbody>
          @foreach ($plans as $plan)
            <tr data-order-id="{{ $plan->id }}">
              <td class="table-reorder-cell">
                <button class="table-reorder-handle" type="button" title="Drag to reorder" aria-label="Drag {{ $plan->name }} to reorder">
                  <i class="bi bi-grip-vertical"></i>
                </button>
              </td>
              <td><div class="fw-semibold">{{ $plan->name }}</div><div class="small text-secondary">{{ Str::limit($plan->description, 80) }}</div></td>
              <td>Rp {{ number_format((float) $plan->price, 0, ',', '.') }}</td>
              <td><span class="badge {{ $plan->highlight ? 'bg-primary' : 'bg-secondary' }}">{{ $plan->highlight ? 'Yes' : 'No' }}</span></td>
              <td>{{ implode(', ', array_slice($plan->features ?? [], 0, 3)) }}</td>
              <td class="text-end">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.plans.edit', $plan) }}"><i class="bi bi-pencil"></i></a>
                <form class="d-inline" action="{{ route('admin.plans.destroy', $plan) }}" method="POST" onsubmit="return confirm('Hapus plan ini?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger" type="submit"><i class="bi bi-trash"></i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </x-table-card>
@endsection
