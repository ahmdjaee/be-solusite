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
      <input class="form-control" type="search" placeholder="Search admin data">
    </div>
  </div>

  <div class="page-actions ms-auto">
    <a class="btn btn-primary" href="{{ route('admin.products.create') }}">
      <i class="bi bi-plus-lg me-1"></i>Product
    </a>
    <button class="btn btn-outline-primary toolbar-icon" type="button" data-theme-toggle aria-label="Toggle theme">
      <i class="bi bi-moon-stars"></i>
    </button>
  </div>
</nav>
