@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Products" subtitle="Produk aplikasi digital dan source code.">
    <x-slot:actions>
      <a class="btn btn-primary" href="{{ route('admin.products.create') }}"><i class="bi bi-plus-lg me-1"></i>Create</a>
    </x-slot:actions>

    <div class="table-responsive">
      <table class="table align-middle mb-0" data-table data-per-page="10" data-table-reorder="{{ route('admin.products.reorder') }}">
        <thead>
          <tr>
            <th class="table-reorder-column" data-sortable="false" aria-label="Order"></th>
            <th data-sortable="false">Image</th>
            <th data-sortable="false">Name</th>
            <th data-sortable="false">Type</th>
            <th data-sortable="false">Price</th>
            <th data-sortable="false">Final</th>
            <th data-sortable="false">Status</th>
            <th class="text-end" data-sortable="false">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr data-order-id="{{ $product->id }}">
              <td class="table-reorder-cell">
                <button class="table-reorder-handle" type="button" title="Drag to reorder" aria-label="Drag {{ $product->name }} to reorder">
                  <i class="bi bi-grip-vertical"></i>
                </button>
              </td>
              <td>
                @if ($product->thumbnail_url)
                  <img src="{{ $product->thumbnail_url }}" alt="{{ $product->name }}" class="rounded" style="width: 48px; height: 48px; object-fit: cover;">
                @else
                  <div class="rounded bg-light d-flex align-items-center justify-content-center text-secondary" style="width: 48px; height: 48px;">
                    <i class="bi bi-image"></i>
                  </div>
                @endif
              </td>
              <td>
                <div class="fw-semibold">{{ $product->name }}</div>
                <div class="small text-secondary">{{ $product->short }}</div>
              </td>
              <td><span class="badge bg-secondary">{{ $product->type }}</span></td>
              <td>Rp {{ number_format((float) $product->price, 0, ',', '.') }}</td>
              <td>Rp {{ number_format($product->finalPrice(), 0, ',', '.') }}</td>
              <td><span class="badge bg-primary">{{ $product->status }}</span></td>
              <td class="text-end">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.products.edit', $product) }}"><i class="bi bi-pencil"></i></a>
                <form class="d-inline" action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus product ini?')">
                  @csrf
                  @method('DELETE')
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
