@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Services" subtitle="Layanan implementasi, custom, dan konsultasi.">
    <x-slot:actions>
      <a class="btn btn-primary" href="{{ route('admin.services.create') }}"><i class="bi bi-plus-lg me-1"></i>Create</a>
    </x-slot:actions>

    <div class="table-responsive">
      <table class="table align-middle mb-0" data-table data-per-page="10">
        <thead><tr><th>Name</th><th>Level</th><th>Price</th><th>Availability</th><th class="text-end" data-sortable="false">Actions</th></tr></thead>
        <tbody>
          @foreach ($services as $service)
            <tr>
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
