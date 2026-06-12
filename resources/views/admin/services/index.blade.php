@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Services" subtitle="Layanan implementasi, custom, dan konsultasi.">
    <x-slot:actions>
      <a class="btn btn-primary" href="{{ route('admin.services.create') }}"><i class="bi bi-plus-lg me-1"></i>Create</a>
    </x-slot:actions>

    <div class="table-responsive">
      <table class="table align-middle mb-0" data-table data-per-page="10" data-table-reorder="{{ route('admin.services.reorder') }}">
        <thead><tr><th class="table-reorder-column" data-sortable="false" aria-label="Order"></th><th data-sortable="false">Name</th><th data-sortable="false">Level</th><th data-sortable="false">Price</th><th data-sortable="false">Availability</th><th class="text-end" data-sortable="false">Actions</th></tr></thead>
        <tbody>
          @foreach ($services as $service)
            <tr data-order-id="{{ $service->id }}">
              <td class="table-reorder-cell">
                <button class="table-reorder-handle" type="button" title="Drag to reorder" aria-label="Drag {{ $service->name }} to reorder">
                  <i class="bi bi-grip-vertical"></i>
                </button>
              </td>
              <td><div class="fw-semibold">{{ $service->name }}</div><div class="small text-secondary">{{ Str::limit($service->description, 80) }}</div></td>
              <td>{{ $service->level }}</td>
              <td>Rp {{ number_format((float) $service->price, 0, ',', '.') }}</td>
              <td><span class="badge bg-primary">{{ $service->availability }}</span></td>
              <td class="text-end">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.services.edit', $service) }}"><i class="bi bi-pencil"></i></a>
                <form class="d-inline" action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Hapus service ini?')">
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
