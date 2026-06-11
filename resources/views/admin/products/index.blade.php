@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Products" subtitle="Produk aplikasi digital dan source code.">
    <x-slot:actions>
      <a class="btn btn-primary" href="{{ route('admin.products.create') }}"><i class="bi bi-plus-lg me-1"></i>Create</a>
    </x-slot:actions>

    <div class="table-responsive">
      <table class="table align-middle mb-0" data-table data-per-page="10">
        <thead>
          <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>Final</th>
            <th>Status</th>
            <th class="text-end" data-sortable="false">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr>
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
