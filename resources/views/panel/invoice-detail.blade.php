@extends('layouts.app')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('invoices') }}">Invoices</a></li>
@endsection

@section('content')
  <div class="row g-3 justify-content-center">
    <div class="col-xl-9">

      {{-- Invoice card --}}
      <div class="surface p-4 p-md-5 invoice-print-body mb-3">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-5">
          <div>
            <a class="app-brand d-inline-flex align-items-center gap-2 text-decoration-none mb-2" href="{{ route('dashboard') }}">
              <span class="brand-mark"><i class="bi bi-grid-1x2-fill"></i></span>
              <span class="brand-copy">Solusite Admin<small>Operations Suite</small></span>
            </a>
            <div class="text-secondary small">123 Operations Lane, New York, NY 10001</div>
            <div class="text-secondary small">finance@example.com · +1 800 555 0199</div>
          </div>
          <div class="text-end">
            <div class="h2 fw-bold mb-1">{{ $invoice['number'] }}</div>
            <x-badge :tone="$invoice['badge']">{{ $invoice['status'] }}</x-badge>
          </div>
        </div>

        {{-- Bill to / dates --}}
        <div class="row g-4 mb-5">
          <div class="col-sm-6">
            <div class="small text-secondary fw-bold text-uppercase mb-2" style="letter-spacing:.05em">Bill To</div>
            <div class="fw-bold">{{ $invoice['customer'] }}</div>
            <div class="text-secondary small">Accounts Payable Dept.</div>
            <div class="text-secondary small">{{ 'finance@' . Str::slug($invoice['customer']) . '.co' }}</div>
          </div>
          <div class="col-sm-3">
            <div class="small text-secondary fw-bold text-uppercase mb-2" style="letter-spacing:.05em">Invoice Date</div>
            <div class="fw-bold">{{ $invoice['date'] }}</div>
          </div>
          <div class="col-sm-3">
            <div class="small text-secondary fw-bold text-uppercase mb-2" style="letter-spacing:.05em">Due Date</div>
            <div class="fw-bold {{ $invoice['badge'] === 'danger' ? 'text-danger' : '' }}">{{ $invoice['due'] }}</div>
          </div>
        </div>

        {{-- Line items --}}
        <div class="table-responsive mb-4">
          <table class="table" style="border-collapse: separate; border-spacing: 0;">
            <thead>
              <tr>
                <th class="border-bottom border-top" style="padding: .65rem .75rem; font-size: .76rem; font-weight: 550; text-transform: uppercase; color: var(--app-muted);">Description</th>
                <th class="border-bottom border-top text-center" style="padding: .65rem .75rem; font-size: .76rem; font-weight: 550; text-transform: uppercase; color: var(--app-muted); width: 80px;">Qty</th>
                <th class="border-bottom border-top text-end" style="padding: .65rem .75rem; font-size: .76rem; font-weight: 550; text-transform: uppercase; color: var(--app-muted); width: 120px;">Unit Price</th>
                <th class="border-bottom border-top text-end" style="padding: .65rem .75rem; font-size: .76rem; font-weight: 550; text-transform: uppercase; color: var(--app-muted); width: 120px;">Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($invoice['items'] as $item)
                <tr>
                  <td style="padding: .8rem .75rem; border-bottom: 1px solid var(--app-border);">
                    <div class="fw-500">{{ $item['name'] }}</div>
                    @if (!empty($item['desc']))
                      <div class="text-secondary small">{{ $item['desc'] }}</div>
                    @endif
                  </td>
                  <td class="text-center" style="padding: .8rem .75rem; border-bottom: 1px solid var(--app-border);">{{ $item['qty'] }}</td>
                  <td class="text-end" style="padding: .8rem .75rem; border-bottom: 1px solid var(--app-border);">{{ $item['price'] }}</td>
                  <td class="text-end fw-bold" style="padding: .8rem .75rem; border-bottom: 1px solid var(--app-border);">{{ $item['total'] }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        {{-- Totals --}}
        <div class="row justify-content-end">
          <div class="col-sm-5">
            <div class="d-flex justify-content-between py-2 border-bottom">
              <span class="text-secondary">Subtotal</span>
              <span class="fw-500">{{ $invoice['subtotal'] }}</span>
            </div>
            <div class="d-flex justify-content-between py-2 border-bottom">
              <span class="text-secondary">Tax ({{ $invoice['tax_rate'] }})</span>
              <span class="fw-500">{{ $invoice['tax'] }}</span>
            </div>
            @if (!empty($invoice['discount']))
              <div class="d-flex justify-content-between py-2 border-bottom text-success">
                <span>Discount</span>
                <span class="fw-500">-{{ $invoice['discount'] }}</span>
              </div>
            @endif
            <div class="d-flex justify-content-between py-3">
              <span class="fw-bold h5 mb-0">Total</span>
              <span class="fw-bold h5 mb-0">{{ $invoice['amount'] }}</span>
            </div>
          </div>
        </div>

        {{-- Footer notes --}}
        <div class="border-top pt-4 mt-2">
          <div class="row g-4">
            <div class="col-sm-7">
              <div class="small text-secondary fw-bold text-uppercase mb-1" style="letter-spacing:.05em">Payment Instructions</div>
              <div class="small text-secondary">Bank: Global Commerce Bank · Account: 8821-0094-3377<br>Routing: 021000021 · Reference: {{ $invoice['number'] }}</div>
            </div>
            <div class="col-sm-5">
              <div class="small text-secondary fw-bold text-uppercase mb-1" style="letter-spacing:.05em">Terms</div>
              <div class="small text-secondary">Payment due within 14 days. Late payments accrue 1.5% monthly interest.</div>
            </div>
          </div>
        </div>
      </div>

      {{-- Actions bar (hidden on print) --}}
      <div class="d-flex gap-2 justify-content-end invoice-print-actions">
        <a class="btn btn-outline-primary" href="{{ route('invoices') }}"><i class="bi bi-arrow-left me-1"></i>Back to Invoices</a>
        <button class="btn btn-outline-primary" onclick="window.print()"><i class="bi bi-download me-1"></i>Export PDF</button>
        <button class="btn btn-primary" onclick="window.print()"><i class="bi bi-printer me-1"></i>Print</button>
      </div>

    </div>
  </div>
@endsection
