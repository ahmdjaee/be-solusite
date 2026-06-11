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
          <span class="icon-box"><i class="bi bi-arrow-return-left"></i></span>
        </div>
        <div class="metric-label">Total Returns</div>
        <div class="metric-value mt-3">284</div>
        <div class="small text-secondary mt-2">All return requests</div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="metric-card warning">
        <div class="d-flex justify-content-between align-items-start mb-4">
          <span class="icon-box warning"><i class="bi bi-hourglass-split"></i></span>
        </div>
        <div class="metric-label">Pending Review</div>
        <div class="metric-value mt-3">42</div>
        <div class="small text-secondary mt-2">Awaiting inspection</div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="metric-card success">
        <div class="d-flex justify-content-between align-items-start mb-4">
          <span class="icon-box success"><i class="bi bi-check-circle"></i></span>
        </div>
        <div class="metric-label">Approved</div>
        <div class="metric-value mt-3">198</div>
        <div class="small text-secondary mt-2">Cleared for refund</div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="metric-card">
        <div class="d-flex justify-content-between align-items-start mb-4">
          <span class="icon-box"><i class="bi bi-currency-dollar"></i></span>
        </div>
        <div class="metric-label">Refunded</div>
        <div class="metric-value mt-3">$14,820</div>
        <div class="small text-secondary mt-2">Total value processed</div>
      </div>
    </div>
  </div>

  <x-table-card title="Return Requests" subtitle="Return requests, inspection status, and refund processing">
    <x-slot:actions>
      <button class="btn btn-outline-primary"><i class="bi bi-funnel me-1"></i><span>Filter</span></button>
      <button class="btn btn-outline-primary"><i class="bi bi-download me-1"></i><span>Export</span></button>
      <button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i><span>New Return</span></button>
    </x-slot:actions>
    <table class="table align-middle" data-table data-per-page="8">
      <thead>
        <tr>
          <th>Return ID</th>
          <th>Order</th>
          <th>Customer</th>
          <th>Reason</th>
          <th>Status</th>
          <th>Refund Amount</th>
          <th>Requested</th>
          <th class="no-sort">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><strong>RET-2026-0041</strong></td>
          <td>ORD-20810</td>
          <td>Brad Santos</td>
          <td>Wrong item</td>
          <td><span class="badge badge-soft-warning">Pending Review</span></td>
          <td>$128.00</td>
          <td>Jun 01, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Approve"><i class="bi bi-check-lg"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>RET-2026-0042</strong></td>
          <td>ORD-20791</td>
          <td>Sophie Ray</td>
          <td>Damaged</td>
          <td><span class="badge badge-soft-success">Approved</span></td>
          <td>$75.50</td>
          <td>May 29, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Approve"><i class="bi bi-check-lg"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>RET-2026-0043</strong></td>
          <td>ORD-20774</td>
          <td>Andre Ford</td>
          <td>Not as described</td>
          <td><span class="badge badge-soft-success">Refunded</span></td>
          <td>$210.00</td>
          <td>May 27, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Approve"><i class="bi bi-check-lg"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>RET-2026-0044</strong></td>
          <td>ORD-20760</td>
          <td>Dana Kim</td>
          <td>Change of mind</td>
          <td><span class="badge badge-soft-danger">Rejected</span></td>
          <td>$0.00</td>
          <td>May 25, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Approve"><i class="bi bi-check-lg"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>RET-2026-0045</strong></td>
          <td>ORD-20749</td>
          <td>Rex Palmer</td>
          <td>Damaged</td>
          <td><span class="badge badge-soft-warning">Pending Review</span></td>
          <td>$340.00</td>
          <td>May 24, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Approve"><i class="bi bi-check-lg"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>RET-2026-0046</strong></td>
          <td>ORD-20738</td>
          <td>Fitri Handayani</td>
          <td>Wrong item</td>
          <td><span class="badge badge-soft-success">Approved</span></td>
          <td>$88.00</td>
          <td>May 22, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Approve"><i class="bi bi-check-lg"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>RET-2026-0047</strong></td>
          <td>ORD-20715</td>
          <td>Henry Ward</td>
          <td>Not as described</td>
          <td><span class="badge badge-soft-success">Refunded</span></td>
          <td>$162.00</td>
          <td>May 19, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Approve"><i class="bi bi-check-lg"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>RET-2026-0048</strong></td>
          <td>ORD-20700</td>
          <td>Maya Lewis</td>
          <td>Change of mind</td>
          <td><span class="badge badge-soft-warning">Pending Review</span></td>
          <td>$55.00</td>
          <td>May 17, 2026</td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="View"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Approve"><i class="bi bi-check-lg"></i></button></span></td>
        </tr>
      </tbody>
    </table>
  </x-table-card>

@endsection
