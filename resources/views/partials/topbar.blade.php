<nav class="topbar">
  <button class="btn btn-outline-primary toolbar-icon d-lg-none" type="button" data-sidebar-toggle aria-label="Open menu">
    <i class="bi bi-list"></i>
  </button>
  <button class="btn btn-outline-primary toolbar-icon d-none d-lg-flex" type="button" data-sidebar-collapse aria-label="Toggle sidebar">
    <i class="bi bi-layout-sidebar"></i>
  </button>

  <div class="topbar-search">
    <div class="input-group">
      <span class="input-group-text"><i class="bi bi-search"></i></span>
      <input class="form-control" type="search" placeholder="{{ $searchPlaceholder ?? 'Search data' }}">
    </div>
  </div>

  <div class="page-actions ms-auto">
    <div class="dropdown">
      <button class="btn btn-outline-primary toolbar-icon" type="button" data-bs-toggle="dropdown" aria-label="Notifications">
        <i class="bi bi-bell"></i>
      </button>
      <div class="dropdown-menu dropdown-menu-end p-2" style="min-width: 21.429rem">
        <div class="fw-semibold px-2 py-1">Notifications</div>
        <a class="dropdown-item rounded-2" href="{{ route('orders') }}">18 orders waiting to be processed</a>
        <a class="dropdown-item rounded-2" href="{{ route('audit') }}">API token created 12 minutes ago</a>
        <a class="dropdown-item rounded-2" href="{{ route('products') }}">3 products are running low</a>
      </div>
    </div>
    <button class="btn btn-outline-primary toolbar-icon" type="button" data-theme-toggle aria-label="Toggle theme">
      <i class="bi bi-moon-stars"></i>
    </button>
    <div class="dropdown">
      <button class="btn p-0 border-0" type="button" data-bs-toggle="dropdown" aria-label="User menu">
        <span class="avatar">AD</span>
      </button>
      <div class="dropdown-menu dropdown-menu-end">
        <a class="dropdown-item" href="{{ route('profile') }}"><i class="bi bi-person-gear me-2"></i>Profile</a>
        <a class="dropdown-item" href="{{ route('settings') }}"><i class="bi bi-gear me-2"></i>Settings</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('login') }}"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
      </div>
    </div>
  </div>
</nav>
