@extends('layouts.app')

@section('content')
  <x-metric-grid :metrics="$metrics" />

  <div class="row g-3">
    <div class="col-xl-9">
      <x-table-card title="Invoice Register" subtitle="Invoice list with payment status and due dates">
        <x-slot:actions>
          <button class="btn btn-outline-primary"><i class="bi bi-envelope me-1"></i><span>Remind</span></button>
          <button class="btn btn-outline-primary"><i class="bi bi-credit-card me-1"></i><span>Reconcile</span></button>
          <button class="btn btn-outline-primary"><i class="bi bi-download me-1"></i><span>Export</span></button>
          <button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i><span>Invoice</span></button>
        </x-slot:actions>
        <table class="table align-middle" data-table data-per-page="8">
          <thead><tr><th>Invoice</th><th>Customer</th><th>Timeline</th><th>Status</th><th>Amount</th><th class="no-sort">Actions</th></tr></thead>
          <tbody>
            @foreach ($invoices as $invoice)
              <tr>
                <td><strong>{{ $invoice['number'] }}</strong></td>
                <td>{{ $invoice['customer'] }}</td>
                <td><strong>{{ $invoice['date'] }}</strong><div class="small text-secondary">Due {{ $invoice['due'] }}</div></td>
                <td><x-badge :tone="$invoice['badge']">{{ $invoice['status'] }}</x-badge></td>
                <td>{{ $invoice['amount'] }}</td>
                <td><span class="action-stack"><button class="btn btn-sm btn-outline-primary action-btn"><i class="bi bi-eye"></i></button><button class="btn btn-sm btn-outline-primary action-btn"><i class="bi bi-download"></i></button></span></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </x-table-card>
    </div>
    <div class="col-xl-3">
      <div class="surface p-3 p-md-4 invoice-preview">
        <div class="d-flex justify-content-between align-items-start mb-4">
          <div>
            <div class="small text-secondary">Preview</div>
            <h2 class="h5 fw-bold mb-0">INV-2026-0418</h2>
          </div>
          <x-badge tone="success">Paid</x-badge>
        </div>
        <div class="d-grid gap-3">
          <div><div class="small text-secondary">Bill To</div><strong>PT Nusantara Retail</strong></div>
          <div class="d-flex justify-content-between"><span>Platform Fee</span><strong>$38,200</strong></div>
          <div class="d-flex justify-content-between"><span>Support SLA</span><strong>$6,000</strong></div>
          <div class="d-flex justify-content-between"><span>Tax 11%</span><strong>$4,000</strong></div>
          <div class="border-top pt-3 d-flex justify-content-between h5 fw-bold"><span>Total</span><span>$48,200</span></div>
        </div>
        <button class="btn btn-primary w-100 mt-4"><i class="bi bi-printer me-1"></i>Print Invoice</button>
      </div>
    </div>
  </div>
@endsection
