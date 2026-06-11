@extends('layouts.app')

@section('content')
  <x-metric-grid :metrics="$metrics" />

  <x-filter-bar>
    @foreach ([
      'Category' => ['All categories', 'Fashion', 'Gadget', 'Home', 'Stationery'],
      'Status' => ['All statuses', 'Active', 'Draft', 'Review', 'Archived'],
      'Supplier' => ['All suppliers', 'Blue Supply', 'Lintas Retail', 'Urban Goods'],
    ] as $label => $options)
      <div>
        <label class="form-label small fw-bold">{{ $label }}</label>
        <select class="form-select" data-control="select2" data-placeholder="{{ $options[0] }}">
          @foreach ($options as $option)
            <option @selected($loop->first)>{{ $option }}</option>
          @endforeach
        </select>
      </div>
    @endforeach
    <div class="d-flex align-items-end gap-2">
      <button class="btn btn-primary flex-fill"><i class="bi bi-funnel me-1"></i>Apply</button>
      <button class="btn btn-outline-primary toolbar-icon" aria-label="Reset filter"><i class="bi bi-arrow-counterclockwise"></i></button>
    </div>
  </x-filter-bar>

  <x-table-card title="Product Inventory" subtitle="Product data with CRUD controls, status, stock, and channels">
    <x-slot:actions>
      <button class="btn btn-outline-primary"><i class="bi bi-upload me-1"></i><span>Import</span></button>
      <button class="btn btn-outline-primary"><i class="bi bi-tags me-1"></i><span>Bulk Tag</span></button>
      <button class="btn btn-outline-primary"><i class="bi bi-download me-1"></i><span>Export</span></button>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal"><i class="bi bi-plus-lg me-1"></i><span>Product</span></button>
    </x-slot:actions>
    <table class="table align-middle" data-table data-per-page="8">
      <thead>
        <tr>
          <th class="no-sort"><input class="form-check-input" type="checkbox" data-check-all=".product-check" aria-label="Select all products"></th>
          <th>Product</th><th>Category</th><th>Stock</th><th>Status</th><th>Channel</th><th>Price</th><th class="no-sort">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td><input class="form-check-input product-check" type="checkbox"></td>
            <td><strong>{{ $product['name'] }}</strong><div class="small text-secondary">SKU {{ $product['sku'] }}</div></td>
            <td>{{ $product['category'] }}</td>
            <td>
              <div class="d-flex justify-content-between small"><span>{{ $product['stock'] }} unit</span><span>{{ $product['stock_percent'] }}%</span></div>
              <div class="progress-thin"><span style="width:{{ $product['stock_percent'] }}%"></span></div>
            </td>
            <td><x-badge :tone="$product['badge']">{{ $product['status'] }}</x-badge></td>
            <td>{{ $product['channel'] }}</td>
            <td>{{ $product['price'] }}</td>
            <td>
              <span class="action-stack">
                <button class="btn btn-sm btn-outline-primary action-btn" data-bs-toggle="tooltip" title="Edit"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-outline-primary action-btn" data-bs-toggle="tooltip" title="Duplicate"><i class="bi bi-copy"></i></button>
                <button class="btn btn-sm btn-outline-danger action-btn" data-bs-toggle="tooltip" title="Delete"><i class="bi bi-trash"></i></button>
              </span>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </x-table-card>
@endsection

@push('modals')
  @include('panel.partials.product-modal')
@endpush
