@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Discounts" subtitle="Promo untuk product digital. Active dihitung dari status dan periode tanggal.">
    <x-slot:actions>
      <a class="btn btn-primary" href="{{ route('admin.discounts.create') }}"><i class="bi bi-plus-lg me-1"></i>Create</a>
    </x-slot:actions>

    <div class="table-responsive">
      <table class="table align-middle mb-0" data-table data-per-page="10">
        <thead><tr><th>Name</th><th>Product</th><th>Code</th><th>Type</th><th>Value</th><th>Active</th><th class="text-end" data-sortable="false">Actions</th></tr></thead>
        <tbody>
          @foreach ($discounts as $discount)
            <tr>
              <td class="fw-semibold">{{ $discount->name }}</td>
              <td>{{ $discount->product?->name }}</td>
              <td><code>{{ $discount->code }}</code></td>
              <td>{{ $discount->type }}</td>
              <td>{{ $discount->type === 'percentage' ? $discount->value.'%' : 'Rp '.number_format((float) $discount->value, 0, ',', '.') }}</td>
              <td><span class="badge {{ $discount->isCurrentlyActive() ? 'bg-success' : 'bg-secondary' }}">{{ $discount->isCurrentlyActive() ? 'Active' : 'Inactive' }}</span></td>
              <td class="text-end">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.discounts.edit', $discount) }}"><i class="bi bi-pencil"></i></a>
                <form class="d-inline" action="{{ route('admin.discounts.destroy', $discount) }}" method="POST" onsubmit="return confirm('Hapus discount ini?')">
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
