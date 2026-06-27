@extends('admin.layouts.app')

@section('content')
  <x-metric-grid :metrics="$summary" />

  <x-table-card title="Recent Products" subtitle="Produk terbaru di katalog.">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Created</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($products as $product)
            <tr>
              <td class="fw-semibold">{{ $product->name }}</td>
              <td><span class="badge bg-info-subtle text-info-emphasis">{{ $product->category?->name ?? '—' }}</span></td>
              <td>Rp {{ number_format((float) $product->price, 0, ',', '.') }}</td>
              <td>{{ $product->created_at?->format('d M Y') }}</td>
            </tr>
          @empty
            <tr><td colspan="4" class="text-center text-secondary py-4">Belum ada product.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </x-table-card>
@endsection
