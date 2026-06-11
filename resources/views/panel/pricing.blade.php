@extends('layouts.app')

@section('breadcrumb')
  <li class="breadcrumb-item">Template</li>
@endsection

@section('content')
  <div class="text-center mb-5 mt-2">
    <h1 class="fw-bold mb-2">Choose Your Plan</h1>
    <p class="text-secondary mb-0">Scale as your business grows</p>
  </div>

  <div class="row g-4 justify-content-center mb-4">

    {{-- Starter --}}
    <div class="col-md-4">
      <div class="surface p-4 h-100 d-flex flex-column">
        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <h2 class="h5 fw-bold mb-0">Starter</h2>
          </div>
          <div class="text-secondary small">Perfect for small teams and solo founders.</div>
        </div>
        <div class="mb-3">
          <span class="fw-bold" style="font-size: 2.5rem; line-height: 1">$29</span>
          <span class="text-secondary">/mo</span>
          <div class="small text-secondary mt-1">Billed monthly, cancel anytime</div>
        </div>
        <ul class="list-unstyled d-grid gap-2 mb-4 flex-fill">
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Up to 5 team members</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>10,000 orders / month</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Basic analytics dashboard</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Email support (48h SLA)</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>2 sales channels</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Standard reports</li>
        </ul>
        <button class="btn btn-outline-primary w-100 mt-auto">Get Started</button>
      </div>
    </div>

    {{-- Professional (Popular) --}}
    <div class="col-md-4">
      <div class="surface p-4 h-100 d-flex flex-column" style="border-top: 3px solid var(--app-blue)">
        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <h2 class="h5 fw-bold mb-0">Professional</h2>
            <span class="badge badge-soft">Popular</span>
          </div>
          <div class="text-secondary small">For growing businesses that need more power.</div>
        </div>
        <div class="mb-3">
          <span class="fw-bold" style="font-size: 2.5rem; line-height: 1">$79</span>
          <span class="text-secondary">/mo</span>
          <div class="small text-secondary mt-1">Billed monthly, cancel anytime</div>
        </div>
        <ul class="list-unstyled d-grid gap-2 mb-4 flex-fill">
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Up to 20 team members</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>100,000 orders / month</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Advanced analytics & reports</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Priority support (8h SLA)</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Unlimited sales channels</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Coupon & promotions engine</li>
        </ul>
        <button class="btn btn-primary w-100 mt-auto">Get Started</button>
      </div>
    </div>

    {{-- Enterprise --}}
    <div class="col-md-4">
      <div class="surface p-4 h-100 d-flex flex-column">
        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <h2 class="h5 fw-bold mb-0">Enterprise</h2>
          </div>
          <div class="text-secondary small">Custom solutions for large-scale operations.</div>
        </div>
        <div class="mb-3">
          <span class="fw-bold" style="font-size: 2.5rem; line-height: 1">Custom</span>
          <div class="small text-secondary mt-1">Contact us for a tailored quote</div>
        </div>
        <ul class="list-unstyled d-grid gap-2 mb-4 flex-fill">
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Unlimited team members</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Unlimited orders</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Custom analytics & BI export</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Dedicated account manager</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>White-label options</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>On-premise deployment</li>
        </ul>
        <button class="btn btn-outline-primary w-100 mt-auto">Contact Sales</button>
      </div>
    </div>

  </div>

  <div class="text-center text-secondary small">
    All plans include 14-day free trial. No credit card required.
  </div>
@endsection
