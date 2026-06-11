@php($navigation = \App\Support\PanelData::navigation())

<aside class="app-sidebar">
  {{-- Fixed top: brand --}}
  <div class="sidebar-header">
    <a class="app-brand d-flex align-items-center gap-2 text-decoration-none" href="{{ route('dashboard') }}">
      <span class="brand-mark shrink-0"><i class="bi bi-grid-1x2-fill"></i></span>
      <span class="brand-copy">Solusite Admin<small>Operations Suite</small></span>
    </a>
  </div>

  {{-- Scrollable nav --}}
  <div class="sidebar-nav">
    @foreach ($navigation as $section => $items)
      <div class="nav-section">{{ $section }}</div>
      @foreach ($items as $item)
        <a class="sidebar-link {{ request()->routeIs($item['route']) ? 'active' : '' }}"
           href="{{ route($item['route']) }}"
           title="{{ $item['label'] }}">
          <i class="bi {{ $item['icon'] }} shrink-0"></i>
          <span class="sidebar-link-label">{{ $item['label'] }}</span>
          @isset($item['badge'])
            <span class="nav-badge">{{ $item['badge'] }}</span>
          @endisset
        </a>
      @endforeach
    @endforeach
  </div>

  {{-- Fixed bottom: user profile --}}
  <div class="sidebar-footer">
    <div class="d-flex align-items-center gap-2">
      <span class="avatar avatar-sm shrink-0">AD</span>
      <div class="small min-w-0 flex-fill sidebar-user-info">
        <div class="fw-bold">Admin Demo</div>
        <div class="text-secondary">Super Admin</div>
      </div>
      <a class="btn btn-outline-primary toolbar-icon toolbar-icon-sm sidebar-user-info" href="{{ route('login') }}" aria-label="Logout">
        <i class="bi bi-box-arrow-right"></i>
      </a>
    </div>
  </div>
</aside>
