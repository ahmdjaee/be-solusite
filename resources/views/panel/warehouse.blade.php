@extends('layouts.app')

@section('breadcrumb')
  <li class="breadcrumb-item">Core</li>
@endsection

@section('content')

  {{-- Metric Cards --}}
  <div class="row g-3 mb-3">
    <div class="col-md-6 col-xl-3">
      <div class="metric-card">
        <div class="d-flex justify-content-between align-items-start mb-4">
          <span class="icon-box"><i class="bi bi-building"></i></span>
        </div>
        <div class="metric-label">Total SKUs</div>
        <div class="metric-value mt-3">2,418</div>
        <div class="small text-secondary mt-2">Unique product variants</div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="metric-card warning">
        <div class="d-flex justify-content-between align-items-start mb-4">
          <span class="icon-box warning"><i class="bi bi-exclamation-triangle"></i></span>
        </div>
        <div class="metric-label">Low Stock</div>
        <div class="metric-value mt-3">27</div>
        <div class="small text-secondary mt-2">Below reorder threshold</div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="metric-card danger">
        <div class="d-flex justify-content-between align-items-start mb-4">
          <span class="icon-box danger"><i class="bi bi-x-circle"></i></span>
        </div>
        <div class="metric-label">Out of Stock</div>
        <div class="metric-value mt-3">8</div>
        <div class="small text-secondary mt-2">Immediate restock needed</div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="metric-card">
        <div class="d-flex justify-content-between align-items-start mb-4">
          <span class="icon-box"><i class="bi bi-geo-alt"></i></span>
        </div>
        <div class="metric-label">Locations</div>
        <div class="metric-value mt-3">4</div>
        <div class="small text-secondary mt-2">Active warehouse zones</div>
      </div>
    </div>
  </div>

  <x-table-card title="Inventory Ledger" subtitle="Inventory locations, stock levels, and reorder management">
    <x-slot:actions>
      <button class="btn btn-outline-primary"><i class="bi bi-funnel me-1"></i><span>Filter</span></button>
      <button class="btn btn-outline-primary"><i class="bi bi-arrow-clockwise me-1"></i><span>Sync</span></button>
      <button class="btn btn-outline-primary"><i class="bi bi-download me-1"></i><span>Export</span></button>
      <button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i><span>Add Stock</span></button>
    </x-slot:actions>
    <table class="table align-middle" data-table data-per-page="10">
      <thead>
        <tr>
          <th>SKU</th>
          <th>Product Name</th>
          <th>Category</th>
          <th>Stock</th>
          <th>Reorder Level</th>
          <th>Location</th>
          <th>Status</th>
          <th class="no-sort">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><strong>SKU-001842</strong></td>
          <td>Wireless Noise-Cancelling Headphones<div class="small text-secondary">Black / XL</div></td>
          <td>Electronics</td>
          <td>248</td>
          <td>50</td>
          <td>Rack A1</td>
          <td><span class="badge badge-soft-success">In Stock</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SKU-002310</strong></td>
          <td>Ergonomic Office Chair<div class="small text-secondary">Gray / Standard</div></td>
          <td>Furniture</td>
          <td>32</td>
          <td>40</td>
          <td>Rack B3</td>
          <td><span class="badge badge-soft-warning">Low Stock</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SKU-003077</strong></td>
          <td>USB-C Charging Hub 7-Port<div class="small text-secondary">Silver</div></td>
          <td>Accessories</td>
          <td>0</td>
          <td>20</td>
          <td>Rack A4</td>
          <td><span class="badge badge-soft-danger">Out of Stock</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SKU-004518</strong></td>
          <td>Running Shoes Pro Series<div class="small text-secondary">Blue / Size 42</div></td>
          <td>Footwear</td>
          <td>118</td>
          <td>30</td>
          <td>Rack C2</td>
          <td><span class="badge badge-soft-success">In Stock</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SKU-005200</strong></td>
          <td>Stainless Steel Water Bottle 1L<div class="small text-secondary">Matte Black</div></td>
          <td>Lifestyle</td>
          <td>14</td>
          <td>25</td>
          <td>Rack D1</td>
          <td><span class="badge badge-soft-warning">Low Stock</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SKU-006341</strong></td>
          <td>Smart Fitness Tracker Band<div class="small text-secondary">White / M-L</div></td>
          <td>Electronics</td>
          <td>305</td>
          <td>60</td>
          <td>Rack A2</td>
          <td><span class="badge badge-soft-success">In Stock</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SKU-007882</strong></td>
          <td>Bamboo Cutting Board Set<div class="small text-secondary">Natural / 3pcs</div></td>
          <td>Kitchen</td>
          <td>0</td>
          <td>15</td>
          <td>Rack D3</td>
          <td><span class="badge badge-soft-danger">Out of Stock</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SKU-008490</strong></td>
          <td>Mechanical Keyboard TKL<div class="small text-secondary">White / Blue Switch</div></td>
          <td>Electronics</td>
          <td>77</td>
          <td>25</td>
          <td>Rack A3</td>
          <td><span class="badge badge-soft-success">In Stock</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SKU-009115</strong></td>
          <td>Yoga Mat Premium Anti-Slip<div class="small text-secondary">Purple / 6mm</div></td>
          <td>Sports</td>
          <td>9</td>
          <td>20</td>
          <td>Rack C4</td>
          <td><span class="badge badge-soft-warning">Low Stock</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SKU-010033</strong></td>
          <td>LED Desk Lamp with USB Port<div class="small text-secondary">White / Warm Light</div></td>
          <td>Home Office</td>
          <td>156</td>
          <td>35</td>
          <td>Rack B1</td>
          <td><span class="badge badge-soft-success">In Stock</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button></span></td>
        </tr>
      </tbody>
    </table>
  </x-table-card>

@endsection
