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
          <span class="icon-box"><i class="bi bi-tags"></i></span>
        </div>
        <div class="metric-label">Active Coupons</div>
        <div class="metric-value mt-3">24</div>
        <div class="small text-secondary mt-2">Currently live codes</div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="metric-card">
        <div class="d-flex justify-content-between align-items-start mb-4">
          <span class="icon-box"><i class="bi bi-graph-up-arrow"></i></span>
        </div>
        <div class="metric-label">Used Today</div>
        <div class="metric-value mt-3">182</div>
        <div class="small text-secondary mt-2">Redemptions today</div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="metric-card danger">
        <div class="d-flex justify-content-between align-items-start mb-4">
          <span class="icon-box danger"><i class="bi bi-dash-circle"></i></span>
        </div>
        <div class="metric-label">Revenue Impact</div>
        <div class="metric-value mt-3">-$4,280</div>
        <div class="small text-secondary mt-2">Discount given this month</div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="metric-card">
        <div class="d-flex justify-content-between align-items-start mb-4">
          <span class="icon-box"><i class="bi bi-percent"></i></span>
        </div>
        <div class="metric-label">Avg. Discount</div>
        <div class="metric-value mt-3">18%</div>
        <div class="small text-secondary mt-2">Mean discount rate</div>
      </div>
    </div>
  </div>

  <x-table-card title="Coupon Codes" subtitle="Discount codes, usage tracking, and expiry management">
    <x-slot:actions>
      <button class="btn btn-outline-primary"><i class="bi bi-funnel me-1"></i><span>Filter</span></button>
      <button class="btn btn-outline-primary"><i class="bi bi-download me-1"></i><span>Export</span></button>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCouponModal"><i class="bi bi-plus-lg me-1"></i><span>Create Coupon</span></button>
    </x-slot:actions>
    <table class="table align-middle" data-table data-per-page="8">
      <thead>
        <tr>
          <th>Code</th>
          <th>Type</th>
          <th>Discount</th>
          <th>Min. Order</th>
          <th>Usage</th>
          <th>Expiry</th>
          <th>Status</th>
          <th class="no-sort">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><strong>SAVE20</strong></td>
          <td><span class="badge badge-soft">Percent</span></td>
          <td>20%</td>
          <td>$50.00</td>
          <td>348 / 500</td>
          <td>Jul 31, 2026</td>
          <td><span class="badge badge-soft-success">Active</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Delete"><i class="bi bi-trash"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>NEWUSER50</strong></td>
          <td><span class="badge badge-soft">Percent</span></td>
          <td>50%</td>
          <td>$0.00</td>
          <td>92 / 200</td>
          <td>Dec 31, 2026</td>
          <td><span class="badge badge-soft-success">Active</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Delete"><i class="bi bi-trash"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>FLASH10</strong></td>
          <td><span class="badge badge-soft-warning">Fixed</span></td>
          <td>$10.00</td>
          <td>$30.00</td>
          <td>500 / 500</td>
          <td>Jun 06, 2026</td>
          <td><span class="badge badge-soft-danger">Exhausted</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Delete"><i class="bi bi-trash"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>BLACKFRIDAY</strong></td>
          <td><span class="badge badge-soft">Percent</span></td>
          <td>30%</td>
          <td>$100.00</td>
          <td>1,240 / 2,000</td>
          <td>Nov 30, 2026</td>
          <td><span class="badge badge-soft-success">Active</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Delete"><i class="bi bi-trash"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>FREESHIP</strong></td>
          <td><span class="badge badge-soft-warning">Fixed</span></td>
          <td>$15.00</td>
          <td>$75.00</td>
          <td>204 / 300</td>
          <td>Aug 15, 2026</td>
          <td><span class="badge badge-soft-success">Active</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Delete"><i class="bi bi-trash"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>WELCOME15</strong></td>
          <td><span class="badge badge-soft">Percent</span></td>
          <td>15%</td>
          <td>$25.00</td>
          <td>67 / ∞</td>
          <td>Dec 31, 2026</td>
          <td><span class="badge badge-soft-success">Active</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Delete"><i class="bi bi-trash"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>LOYALTY25</strong></td>
          <td><span class="badge badge-soft">Percent</span></td>
          <td>25%</td>
          <td>$150.00</td>
          <td>18 / 100</td>
          <td>Jun 01, 2026</td>
          <td><span class="badge badge-soft-secondary">Expired</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Delete"><i class="bi bi-trash"></i></button></span></td>
        </tr>
        <tr>
          <td><strong>MIDYEAR40</strong></td>
          <td><span class="badge badge-soft-warning">Fixed</span></td>
          <td>$40.00</td>
          <td>$200.00</td>
          <td>0 / 1,000</td>
          <td>Jun 30, 2026</td>
          <td><span class="badge badge-soft-warning">Scheduled</span></td>
          <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Edit"><i class="bi bi-pencil"></i></button><button class="btn btn-sm btn-outline-primary action-btn" aria-label="Delete"><i class="bi bi-trash"></i></button></span></td>
        </tr>
      </tbody>
    </table>
  </x-table-card>

@endsection

@push('modals')
<div class="modal fade" id="createCouponModal" tabindex="-1" aria-labelledby="createCouponModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content surface">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" id="createCouponModalLabel">Create Coupon</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="createCouponForm">
          <div class="mb-3">
            <label class="form-label fw-bold small">Code</label>
            <input type="text" class="form-control text-uppercase" placeholder="e.g. SAVE20" style="text-transform: uppercase">
            <div class="form-text">Customers enter this code at checkout.</div>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold small">Type</label>
            <select class="form-select">
              <option value="percent">Percentage</option>
              <option value="fixed">Fixed Amount</option>
            </select>
          </div>
          <div class="row g-3 mb-3">
            <div class="col-6">
              <label class="form-label fw-bold small">Amount</label>
              <div class="input-group">
                <input type="number" class="form-control" placeholder="0" min="0">
                <span class="input-group-text">% / $</span>
              </div>
            </div>
            <div class="col-6">
              <label class="form-label fw-bold small">Min. Order ($)</label>
              <input type="number" class="form-control" placeholder="0.00" min="0" step="0.01">
            </div>
          </div>
          <div class="row g-3 mb-3">
            <div class="col-6">
              <label class="form-label fw-bold small">Max Uses</label>
              <input type="number" class="form-control" placeholder="Unlimited" min="1">
            </div>
            <div class="col-6">
              <label class="form-label fw-bold small">Expiry Date</label>
              <input type="date" class="form-control">
            </div>
          </div>
          <div class="mb-3 d-flex align-items-center justify-content-between">
            <label class="form-label fw-bold small mb-0">Active</label>
            <div class="form-check form-switch mb-0">
              <input class="form-check-input" type="checkbox" role="switch" id="couponActiveToggle" checked>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer border-0 pt-0">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Create Coupon</button>
      </div>
    </div>
  </div>
</div>
@endpush
