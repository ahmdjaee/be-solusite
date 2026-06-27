@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Categories" subtitle="Kategori produk digital (CMS, Lainnya, dst).">
    <x-slot:actions>
      <a class="btn btn-primary" href="{{ route('admin.categories.create') }}"><i class="bi bi-plus-lg me-1"></i>Create</a>
    </x-slot:actions>

    <div class="table-responsive">
      <table class="table align-middle mb-0" data-table data-per-page="10">
        <thead>
          <tr>
            <th data-sortable="false">Order</th>
            <th data-sortable="false">Name</th>
            <th data-sortable="false">Slug</th>
            <th data-sortable="false">Products</th>
            <th data-sortable="false">Status</th>
            <th class="text-end" data-sortable="false">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
            <tr>
              <td>{{ $category->sort_order }}</td>
              <td>
                <div class="fw-semibold">{{ $category->name }}</div>
                <div class="small text-secondary">{{ Str::limit($category->description, 60) }}</div>
              </td>
              <td><code>{{ $category->slug }}</code></td>
              <td>{{ $category->products_count }}</td>
              <td>
                @if ($category->is_active)
                  <span class="badge bg-primary">Active</span>
                @else
                  <span class="badge bg-secondary">Inactive</span>
                @endif
              </td>
              <td class="text-end">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.categories.edit', $category) }}"><i class="bi bi-pencil"></i></a>
                <form class="d-inline" action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Hapus category ini?')">
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
