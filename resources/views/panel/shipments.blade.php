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
          <span class="icon-box"><i class="bi bi-box-seam"></i></span>
        </div>
        <div class="metric-label">Total Shipments</div>
        <div class="metric-value mt-3">3,842</div>
        <div class="small text-secondary mt-2">All time records</div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="metric-card warning">
        <div class="d-flex justify-content-between align-items-start mb-4">
          <span class="icon-box warning"><i class="bi bi-truck"></i></span>
        </div>
        <div class="metric-label">In Transit</div>
        <div class="metric-value mt-3">1,204</div>
        <div class="small text-secondary mt-2">Currently on the road</div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="metric-card success">
        <div class="d-flex justify-content-between align-items-start mb-4">
          <span class="icon-box success"><i class="bi bi-check-circle"></i></span>
        </div>
        <div class="metric-label">Delivered</div>
        <div class="metric-value mt-3">2,418</div>
        <div class="small text-secondary mt-2">Successfully received</div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="metric-card danger">
        <div class="d-flex justify-content-between align-items-start mb-4">
          <span class="icon-box danger"><i class="bi bi-x-circle"></i></span>
        </div>
        <div class="metric-label">Failed Delivery</div>
        <div class="metric-value mt-3">38</div>
        <div class="small text-secondary mt-2">Requires rescheduling</div>
      </div>
    </div>
  </div>

  <x-table-card title="Shipment Register" subtitle="Carrier tracking, delivery status, and logistics pipeline">
    <x-slot:actions>
      <button class="btn btn-outline-primary"><i class="bi bi-funnel me-1"></i><span>Filter</span></button>
      <button class="btn btn-outline-primary"><i class="bi bi-download me-1"></i><span>Export</span></button>
      <button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i><span>New Shipment</span></button>
    </x-slot:actions>
    <table class="table align-middle" data-table data-per-page="8">
      <thead>
        <tr>
          <th>Shipment ID</th>
          <th>Order</th>
          <th>Recipient</th>
          <th>Carrier</th>
          <th>Status</th>
          <th>ETA</th>
          <th class="no-sort">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><strong>SHP-2026-0081</strong></td>
          <td>ORD-20840</td>
          <td>Brad Santos<div class="small text-secondary">Los Angeles</div></td>
          <td>FedEx Standard</td>
          <td><span class="badge badge-soft-warning">In Transit</span></td>
          <td>Jun 08, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Track"><i class="bi bi-map"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SHP-2026-0082</strong></td>
          <td>ORD-20841</td>
          <td>Sophie Ray<div class="small text-secondary">Chicago</div></td>
          <td>JNT Express</td>
          <td><span class="badge badge-soft-success">Delivered</span></td>
          <td>Jun 05, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Track"><i class="bi bi-map"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SHP-2026-0083</strong></td>
          <td>ORD-20842</td>
          <td>Andre Ford<div class="small text-secondary">Houston</div></td>
          <td>DHL Express</td>
          <td><span class="badge badge-soft">Picked Up</span></td>
          <td>Jun 07, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Track"><i class="bi bi-map"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SHP-2026-0084</strong></td>
          <td>ORD-20843</td>
          <td>Dana Kim<div class="small text-secondary">Seattle</div></td>
          <td>Pos Indonesia</td>
          <td><span class="badge badge-soft-danger">Failed</span></td>
          <td>Jun 04, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Track"><i class="bi bi-map"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SHP-2026-0085</strong></td>
          <td>ORD-20844</td>
          <td>Rex Palmer<div class="small text-secondary">Austin</div></td>
          <td>Anteraja</td>
          <td><span class="badge badge-soft-warning">In Transit</span></td>
          <td>Jun 09, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Track"><i class="bi bi-map"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SHP-2026-0086</strong></td>
          <td>ORD-20845</td>
          <td>Fitri Handayani<div class="small text-secondary">Makassar</div></td>
          <td>FedEx Standard</td>
          <td><span class="badge badge-soft-success">Delivered</span></td>
          <td>Jun 03, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Track"><i class="bi bi-map"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SHP-2026-0087</strong></td>
          <td>ORD-20846</td>
          <td>Henry Ward<div class="small text-secondary">Phoenix</div></td>
          <td>DHL Express</td>
          <td><span class="badge badge-soft-secondary">Pending</span></td>
          <td>Jun 10, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Track"><i class="bi bi-map"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>SHP-2026-0088</strong></td>
          <td>ORD-20847</td>
          <td>Maya Lewis<div class="small text-secondary">Charlotte</div></td>
          <td>JNT Express</td>
          <td><span class="badge badge-soft-warning">In Transit</span></td>
          <td>Jun 08, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Track"><i class="bi bi-map"></i></button></span></td>
        </tr>
      </tbody>
    </table>
  </x-table-card>

@endsection
