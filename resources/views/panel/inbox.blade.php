@extends('layouts.app')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="#">Workspace</a></li>
@endsection

@section('content')
  <div class="d-flex gap-3" style="height: calc(100vh - 140px); min-height: 520px;">

    {{-- ─── Left column: folder list + email list ───────────────── --}}
    <div class="surface d-flex flex-column" style="width: 280px; flex-shrink: 0; overflow: hidden;">

      {{-- Folder list --}}
      <div class="p-3 border-bottom" style="border-color: var(--app-border) !important;">
        <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
          <h2 class="h6 fw-bold mb-0">Mailbox</h2>
          <button class="btn btn-primary btn-sm" type="button"><i class="bi bi-pencil-square me-1"></i><span>Compose</span></button>
        </div>
        <div class="d-flex flex-column gap-1">

          <a href="#" class="d-flex align-items-center gap-2 px-2 py-2 rounded-2 text-decoration-none fw-bold" style="background: var(--app-blue-soft); color: var(--app-blue-strong); font-size: .875rem;">
            <i class="bi bi-inbox" style="width: 1rem;"></i>
            <span class="flex-1">Inbox</span>
            <span class="badge rounded-pill bg-primary" style="font-size: .7rem;">12</span>
          </a>

          <a href="#" class="d-flex align-items-center gap-2 px-2 py-2 rounded-2 text-decoration-none" style="color: var(--app-text); font-size: .875rem;">
            <i class="bi bi-send" style="width: 1rem;"></i>
            <span class="flex-1">Sent</span>
          </a>

          <a href="#" class="d-flex align-items-center gap-2 px-2 py-2 rounded-2 text-decoration-none" style="color: var(--app-text); font-size: .875rem;">
            <i class="bi bi-file-earmark" style="width: 1rem;"></i>
            <span class="flex-1">Drafts</span>
            <span class="badge rounded-pill" style="font-size: .7rem; background: var(--app-surface-3); color: var(--app-muted);">3</span>
          </a>

          <a href="#" class="d-flex align-items-center gap-2 px-2 py-2 rounded-2 text-decoration-none" style="color: var(--app-text); font-size: .875rem;">
            <i class="bi bi-star" style="width: 1rem;"></i>
            <span class="flex-1">Starred</span>
          </a>

          <a href="#" class="d-flex align-items-center gap-2 px-2 py-2 rounded-2 text-decoration-none" style="color: var(--app-text); font-size: .875rem;">
            <i class="bi bi-trash3" style="width: 1rem;"></i>
            <span class="flex-1">Trash</span>
          </a>

        </div>
      </div>

      {{-- Email list --}}
      <div class="flex-1" style="overflow-y: auto;">

        {{-- Email 1 — selected, unread --}}
        <div class="px-3 py-3 border-bottom" style="cursor: pointer; border-color: var(--app-border) !important; background: var(--app-blue-soft); border-left: 3px solid var(--app-blue);">
          <div class="d-flex justify-content-between align-items-baseline mb-1">
            <span class="fw-bold" style="font-size: .83rem;">Sophie Ray</span>
            <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0;">09:31</span>
          </div>
          <div class="fw-semibold text-truncate" style="font-size: .8rem;">Invoice #INV-2026-0511 — Payment Confirmation</div>
          <div class="text-secondary text-truncate" style="font-size: .76rem;">Please find attached the payment receipt for your invoice…</div>
        </div>

        {{-- Email 2 — unread --}}
        <div class="px-3 py-3 border-bottom" style="cursor: pointer; border-color: var(--app-border) !important; border-left: 3px solid var(--app-blue);">
          <div class="d-flex justify-content-between align-items-baseline mb-1">
            <span class="fw-bold" style="font-size: .83rem;">Brad Santos</span>
            <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0;">08:04</span>
          </div>
          <div class="fw-semibold text-truncate" style="font-size: .8rem;">Re: Order #ORD-11820 Delivery Issue</div>
          <div class="text-secondary text-truncate" style="font-size: .76rem;">I still haven't received the replacement item you mentioned…</div>
        </div>

        {{-- Email 3 — read --}}
        <div class="px-3 py-3 border-bottom" style="cursor: pointer; border-color: var(--app-border) !important; border-left: 3px solid transparent;">
          <div class="d-flex justify-content-between align-items-baseline mb-1">
            <span style="font-size: .83rem;">no-reply@jne.co.id</span>
            <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0;">Yesterday</span>
          </div>
          <div class="text-truncate" style="font-size: .8rem; color: var(--app-text);">Shipment Update: FedEx tracking for FX10028912</div>
          <div class="text-secondary text-truncate" style="font-size: .76rem;">Your shipment has been delivered to the recipient at…</div>
        </div>

        {{-- Email 4 — unread --}}
        <div class="px-3 py-3 border-bottom" style="cursor: pointer; border-color: var(--app-border) !important; border-left: 3px solid var(--app-blue);">
          <div class="d-flex justify-content-between align-items-baseline mb-1">
            <span class="fw-bold" style="font-size: .83rem;">Ahmad Fauzi</span>
            <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0;">Yesterday</span>
          </div>
          <div class="fw-semibold text-truncate" style="font-size: .8rem;">Refund Request — Order #ORD-2198</div>
          <div class="text-secondary text-truncate" style="font-size: .76rem;">I'd like to request a full refund for the above order…</div>
        </div>

        {{-- Email 5 — read --}}
        <div class="px-3 py-3 border-bottom" style="cursor: pointer; border-color: var(--app-border) !important; border-left: 3px solid transparent;">
          <div class="d-flex justify-content-between align-items-baseline mb-1">
            <span style="font-size: .83rem;">ops@marketplace.com</span>
            <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0;">Mon</span>
          </div>
          <div class="text-truncate" style="font-size: .8rem; color: var(--app-text);">Marketplace Performance Report — May 2026</div>
          <div class="text-secondary text-truncate" style="font-size: .76rem;">Your store's monthly summary is ready to view…</div>
        </div>

        {{-- Email 6 — read --}}
        <div class="px-3 py-3 border-bottom" style="cursor: pointer; border-color: var(--app-border) !important; border-left: 3px solid transparent;">
          <div class="d-flex justify-content-between align-items-baseline mb-1">
            <span style="font-size: .83rem;">Maya Sari</span>
            <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0;">Mon</span>
          </div>
          <div class="text-truncate" style="font-size: .8rem; color: var(--app-text);">Damaged Item Complaint — Order #ORD-11791</div>
          <div class="text-secondary text-truncate" style="font-size: .76rem;">The package arrived with visible damage to the outer box…</div>
        </div>

        {{-- Email 7 — unread --}}
        <div class="px-3 py-3 border-bottom" style="cursor: pointer; border-color: var(--app-border) !important; border-left: 3px solid var(--app-blue);">
          <div class="d-flex justify-content-between align-items-baseline mb-1">
            <span class="fw-bold" style="font-size: .83rem;">Diana Austin</span>
            <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0;">Sun</span>
          </div>
          <div class="fw-semibold text-truncate" style="font-size: .8rem;">Bulk Order Inquiry — Corporate Account</div>
          <div class="text-secondary text-truncate" style="font-size: .76rem;">We are looking to place a bulk order of 500 units…</div>
        </div>

        {{-- Email 8 — read --}}
        <div class="px-3 py-3" style="cursor: pointer; border-left: 3px solid transparent;">
          <div class="d-flex justify-content-between align-items-baseline mb-1">
            <span style="font-size: .83rem;">support@midtrans.com</span>
            <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0;">Sat</span>
          </div>
          <div class="text-truncate" style="font-size: .8rem; color: var(--app-text);">Payment Gateway — Scheduled Maintenance Notice</div>
          <div class="text-secondary text-truncate" style="font-size: .76rem;">We will be performing scheduled maintenance on June 8…</div>
        </div>

      </div>
    </div>

    {{-- ─── Right column: email detail ──────────────────────────── --}}
    <div class="surface flex-1 d-flex flex-column" style="overflow: hidden; min-width: 0;">

      {{-- Email header --}}
      <div class="px-4 py-3 border-bottom flex-shrink-0" style="border-color: var(--app-border) !important;">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-2">
          <h5 class="fw-bold mb-0" style="font-size: 1.05rem;">Invoice #INV-2026-0511 — Payment Confirmation</h5>
          <div class="d-flex gap-2">
            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-reply me-1"></i>Reply</button>
            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-forward me-1"></i>Forward</button>
            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-archive me-1"></i>Archive</button>
          </div>
        </div>
        <div class="d-flex flex-column gap-1" style="font-size: .82rem;">
          <div><span class="text-secondary me-2">From:</span><strong>Sophie Ray</strong> <span class="text-secondary">&lt;sophie.ray@gmail.com&gt;</span></div>
          <div><span class="text-secondary me-2">To:</span>admin@blueecommerce.id</div>
          <div><span class="text-secondary me-2">Date:</span>Friday, 6 June 2026, 09:31 EST</div>
        </div>
      </div>

      {{-- Email body --}}
      <div class="flex-1 px-4 py-4" style="overflow-y: auto;">
        <p>Dear Customer Support Team,</p>

        <p>I hope this message finds you well. I am writing to confirm receipt of payment for invoice number <strong>#INV-2026-0511</strong> dated May 30, 2026, in the total amount of <strong>$2,450</strong>. Please find the attached transfer receipt from bank transfer app as proof of transaction. The payment was made on June 5, 2026 at 14:22 EST to the account number listed on the invoice.</p>

        <p>Could you please confirm once the payment has been verified on your end and update the order status accordingly? I have also attached a copy of the original invoice for your reference. My order number is <strong>#ORD-11903</strong> and I am expecting delivery of 3 items: 2× Wireless Earbuds Pro and 1× USB-C Hub 7-in-1. If there are any discrepancies or if you require additional documentation, please do not hesitate to reach out.</p>

        <p>Thank you for your time and excellent service. I look forward to your confirmation and the prompt processing of my order.</p>

        <p>Best regards,<br><strong>Sophie Ray</strong><br>sophie.ray@gmail.com<br>+1 310-988-7711</p>
      </div>

      {{-- Reply box --}}
      <div class="px-4 py-3 border-top flex-shrink-0" style="border-color: var(--app-border) !important;">
        <div class="soft-surface p-3">
          <div class="text-secondary mb-2" style="font-size: .8rem;">Reply to Sophie Ray &lt;sophie.ray@gmail.com&gt;</div>
          <textarea class="form-control mb-2" rows="3" placeholder="Write your reply…" style="resize: none; font-size: .875rem;"></textarea>
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex gap-2">
              <button class="btn btn-outline-secondary toolbar-icon btn-sm" type="button" title="Attach file"><i class="bi bi-paperclip"></i></button>
              <button class="btn btn-outline-secondary toolbar-icon btn-sm" type="button" title="Formatting"><i class="bi bi-type-bold"></i></button>
            </div>
            <button class="btn btn-primary btn-sm" type="button"><i class="bi bi-send me-1"></i>Send Reply</button>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
