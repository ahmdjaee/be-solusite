@extends('admin.layouts.app')

@php
  $grouped = $products->groupBy('category_id');
  $uncategorized = $grouped->get(null, collect());
@endphp

@section('content')
  <x-table-card title="Products" subtitle="Produk digital dikelompokkan per kategori.">
    <x-slot:actions>
      <a class="btn btn-primary" href="{{ route('admin.products.create') }}"><i class="bi bi-plus-lg me-1"></i>Create</a>
    </x-slot:actions>

    {{-- Tabs per kategori --}}
    <ul class="nav nav-tabs px-3 pt-3" role="tablist">
      @foreach ($categories as $category)
        <li class="nav-item" role="presentation">
          <button class="nav-link @if ($loop->first) active @endif" id="tab-cat-{{ $category->id }}" data-bs-toggle="tab" data-bs-target="#pane-cat-{{ $category->id }}" type="button" role="tab">
            {{ $category->name }} <span class="badge bg-secondary ms-1">{{ optional($grouped->get($category->id))->count() ?? 0 }}</span>
          </button>
        </li>
      @endforeach
      @if ($uncategorized->isNotEmpty())
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="tab-cat-none" data-bs-toggle="tab" data-bs-target="#pane-cat-none" type="button" role="tab">
            Tanpa Kategori <span class="badge bg-secondary ms-1">{{ $uncategorized->count() }}</span>
          </button>
        </li>
      @endif
    </ul>

    <div class="tab-content">
      @foreach ($categories as $category)
        <div class="tab-pane fade @if ($loop->first) show active @endif" id="pane-cat-{{ $category->id }}" role="tabpanel">
          <div class="table-responsive">
            <table class="table align-middle mb-0" data-table data-per-page="10" data-table-reorder="{{ route('admin.products.reorder') }}">
              <thead>
                <tr>
                  <th class="table-reorder-column" data-sortable="false" aria-label="Order"></th>
                  <th data-sortable="false">Image</th>
                  <th data-sortable="false">Name</th>
                  <th data-sortable="false">Category</th>
                  <th data-sortable="false">Type</th>
                  <th data-sortable="false">Price</th>
                  <th data-sortable="false">Discount</th>
                  <th data-sortable="false">Status</th>
                  <th class="text-end" data-sortable="false">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($grouped->get($category->id, collect()) as $product)
                  @include('admin.products.row', ['product' => $product, 'reorder' => true])
                @empty
                  <tr><td colspan="9" class="text-center text-secondary py-4">Belum ada produk di kategori ini.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      @endforeach

      @if ($uncategorized->isNotEmpty())
        <div class="tab-pane fade" id="pane-cat-none" role="tabpanel">
          <div class="table-responsive">
            <table class="table align-middle mb-0">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Type</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Status</th>
                  <th class="text-end">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($uncategorized as $product)
                  @include('admin.products.row', ['product' => $product, 'reorder' => false])
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      @endif
    </div>
  </x-table-card>
@endsection
