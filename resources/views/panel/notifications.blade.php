@extends('layouts.app')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="#">Workspace</a></li>
@endsection

@php
  $groups = [
    'Today' => [
      ['icon' => 'bi-bag-check-fill',    'tone' => 'success', 'title' => 'New order received',    'desc' => '#ORD-12284 — Nexus Retail · $4,800',                               'time' => '2 min ago',       'unread' => true],
      ['icon' => 'bi-credit-card-fill',  'tone' => 'success', 'title' => 'Payment confirmed',     'desc' => 'INV-2026-0421 paid via bank transfer · $38,200',                   'time' => '14 min ago',      'unread' => true],
      ['icon' => 'bi-exclamation-triangle-fill', 'tone' => 'warning', 'title' => 'Low stock alert', 'desc' => 'SKU-PRD-0047 has only 3 units remaining',                       'time' => '1 hr ago',        'unread' => true],
      ['icon' => 'bi-person-fill-add',   'tone' => '',        'title' => 'New user registered',   'desc' => 'Rita Morgan joined as store_admin · awaiting email verification',  'time' => '2 hr ago',        'unread' => false],
      ['icon' => 'bi-chat-left-text-fill','tone' => '',       'title' => 'New support ticket',    'desc' => '#TKT-0092 — Damaged item reported by PT Maju Jaya',               'time' => '3 hr ago',        'unread' => true],
    ],
    'Yesterday' => [
      ['icon' => 'bi-arrow-return-left', 'tone' => 'warning', 'title' => 'Return request submitted', 'desc' => '#RET-0042 — Wrong item · Refund $120 pending review',           'time' => 'Yesterday 18:24', 'unread' => true],
      ['icon' => 'bi-shield-exclamation','tone' => 'danger',  'title' => 'Failed login attempt',  'desc' => '5 consecutive failures for admin@example.com from 103.xx.xx.21',  'time' => 'Yesterday 15:10', 'unread' => true],
      ['icon' => 'bi-arrow-repeat',      'tone' => '',        'title' => 'Inventory sync complete','desc' => '2,418 products synced with Amazon & eBay',                         'time' => 'Yesterday 12:00', 'unread' => false],
      ['icon' => 'bi-truck',             'tone' => 'success', 'title' => 'Shipment delivered',    'desc' => '#SHP-2026-0814 delivered to Meridian Corp',                        'time' => 'Yesterday 10:32', 'unread' => false],
    ],
    'Earlier' => [
      ['icon' => 'bi-gear-fill',         'tone' => '',        'title' => 'System update deployed', 'desc' => 'SoluSite Admin v2.4.1 deployed successfully · zero downtime',     'time' => 'Jun 4, 09:00',   'unread' => false],
      ['icon' => 'bi-star-fill',         'tone' => 'warning', 'title' => 'New product review',    'desc' => 'SKU-PRD-0012 received a 5-star review from Rudi Hartono',          'time' => 'Jun 3, 14:22',   'unread' => false],
      ['icon' => 'bi-tag-fill',          'tone' => '',        'title' => 'Coupon FLASH10 expired', 'desc' => 'Campaign closed · 1,204 redemptions total · $3,612 discount',     'time' => 'Jun 2, 23:59',   'unread' => false],
      ['icon' => 'bi-building',          'tone' => 'warning', 'title' => 'Warehouse threshold reached', 'desc' => 'Rack B3 is at 92% capacity · consider rebalancing stock',   'time' => 'Jun 2, 10:15',   'unread' => false],
      ['icon' => 'bi-person-fill-slash', 'tone' => 'danger',  'title' => 'User account locked',   'desc' => 'dedi.kurniawan@example.com locked after 10 failed attempts',       'time' => 'Jun 1, 16:48',   'unread' => false],
      ['icon' => 'bi-receipt',           'tone' => 'success', 'title' => 'Invoice auto-generated', 'desc' => 'INV-2026-0418 generated for PT Nexus Retail · $48,200',           'time' => 'Jun 1, 08:00',   'unread' => false],
    ],
  ];
@endphp

@section('content')
  <div class="surface p-3 p-md-4">

    {{-- Filter tabs --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
      <ul class="nav nav-pills gap-1">
        <li class="nav-item"><button class="nav-link active px-3 py-1">All</button></li>
        <li class="nav-item"><button class="nav-link px-3 py-1">Unread <span class="badge bg-primary ms-1">8</span></button></li>
        <li class="nav-item"><button class="nav-link px-3 py-1">Orders</button></li>
        <li class="nav-item"><button class="nav-link px-3 py-1">System</button></li>
        <li class="nav-item"><button class="nav-link px-3 py-1">Mentions</button></li>
      </ul>
      <div class="page-actions">
        <button class="btn btn-outline-primary btn-sm"><i class="bi bi-funnel me-1"></i><span>Filter</span></button>
        <button class="btn btn-primary btn-sm"><i class="bi bi-check2-all me-1"></i><span>Mark All Read</span></button>
      </div>
    </div>

    {{-- Notification groups --}}
    @foreach ($groups as $label => $items)
      <div class="notif-group-label">{{ $label }}</div>
      <div class="d-flex flex-column gap-2 mb-4">
        @foreach ($items as $n)
          <div class="notif-card {{ $n['unread'] ? 'unread' : '' }}">
            <span class="icon-box shrink-0 {{ $n['tone'] }}">
              <i class="bi {{ $n['icon'] }}"></i>
            </span>
            <div class="notif-card-body">
              <div class="notif-card-title {{ $n['unread'] ? 'fw-semibold' : '' }}">{{ $n['title'] }}</div>
              <div class="notif-card-desc">{{ $n['desc'] }}</div>
            </div>
            <div class="notif-card-meta">
              <span class="notif-card-time">{{ $n['time'] }}</span>
              <button class="btn btn-sm p-0 lh-1 text-secondary" aria-label="Dismiss">
                <i class="bi bi-x-lg" style="font-size:.75rem"></i>
              </button>
            </div>
          </div>
        @endforeach
      </div>
    @endforeach

    {{-- All caught up --}}
    <div class="text-center py-3 text-secondary">
      <i class="bi bi-check2-circle fs-4 text-success d-block mb-1"></i>
      <div class="small">You're all caught up</div>
    </div>
  </div>
@endsection
