@php
  $items = [
    ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'bi-speedometer2'],
    ['label' => 'Products', 'route' => 'admin.products.index', 'icon' => 'bi-box-seam'],
    ['label' => 'Services', 'route' => 'admin.services.index', 'icon' => 'bi-tools'],
    ['label' => 'Portfolio', 'route' => 'admin.portfolio.index', 'icon' => 'bi-window-stack'],
    ['label' => 'Plans', 'route' => 'admin.plans.index', 'icon' => 'bi-credit-card'],
    ['label' => 'Discounts', 'route' => 'admin.discounts.index', 'icon' => 'bi-percent'],
  ];
@endphp

<aside class="app-sidebar">
  <div class="sidebar-header">
    <a class="app-brand d-flex align-items-center gap-2 text-decoration-none" href="{{ route('admin.dashboard') }}">
      <span class="brand-mark shrink-0"><i class="bi bi-grid-1x2-fill"></i></span>
      <span class="brand-copy">Solusite Admin<small>Digital Products</small></span>
    </a>
  </div>

  <div class="sidebar-nav">
    <div class="nav-section">Portfolio Suite</div>
    @foreach ($items as $item)
      <a class="sidebar-link {{ request()->routeIs($item['route']) || request()->routeIs(str_replace('.index', '.*', $item['route'])) ? 'active' : '' }}"
         href="{{ route($item['route']) }}"
         title="{{ $item['label'] }}">
        <i class="bi {{ $item['icon'] }} shrink-0"></i>
        <span class="sidebar-link-label">{{ $item['label'] }}</span>
      </a>
    @endforeach
  </div>

  <div class="sidebar-footer">
    <div class="d-flex align-items-center gap-2">
      <span class="avatar avatar-sm shrink-0">{{ strtoupper(substr(auth()->user()->name ?? 'AD', 0, 2)) }}</span>
      <div class="small min-w-0 flex-fill sidebar-user-info">
        <div class="fw-bold text-truncate">{{ auth()->user()->name ?? 'Admin' }}</div>
        <div class="text-secondary">Administrator</div>
      </div>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-outline-primary toolbar-icon toolbar-icon-sm sidebar-user-info" type="submit" aria-label="Logout">
          <i class="bi bi-box-arrow-right"></i>
        </button>
      </form>
    </div>
  </div>
</aside>
