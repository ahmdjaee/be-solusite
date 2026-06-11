@extends('layouts.app')

@section('content')
  <div class="row g-3 mb-3">
    <div class="col-xl-4">
      <div class="surface p-3 p-md-4 h-100">
        <div class="d-flex justify-content-between align-items-start gap-3 mb-4">
          <div>
            <h2 class="h5 fw-bold mb-1">Package Overview</h2>
            <div class="small text-secondary">Production-ready Laravel admin template for SaaS, commerce, CRM, and operations panels.</div>
          </div>
          <x-badge tone="success">v1.0.0</x-badge>
        </div>
        <div class="docs-meta-grid">
          @foreach ([
            ['Framework', 'Laravel 12'],
            ['UI Layer', 'Blade, Bootstrap 5.3'],
            ['Font', 'Geist'],
            ['Plugins', 'Select2, simple-datatables, Chart.js'],
            ['Base Size', '14px via rem tokens'],
            ['Theme', 'Light and dark mode'],
          ] as [$label, $value])
            <div class="surface-plain p-3">
              <div class="small text-secondary">{{ $label }}</div>
              <strong>{{ $value }}</strong>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-xl-8">
      <div class="surface p-3 p-md-4 h-100">
        <div class="d-flex flex-wrap justify-content-between gap-2 align-items-center mb-3">
          <div>
            <h2 class="h5 fw-bold mb-1">Documentation</h2>
            <div class="small text-secondary">Setup, structure, component conventions, customization, and release checklist.</div>
          </div>
          <div class="page-actions">
            <a class="btn btn-outline-primary" href="{{ route('ui-kit') }}"><i class="bi bi-palette me-1"></i><span>UI Kit</span></a>
            <a class="btn btn-primary" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-1"></i><span>Dashboard</span></a>
          </div>
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <div class="surface-plain p-3 h-100">
              <h3 class="h6 fw-semibold mb-3">Requirements</h3>
              <ul class="mb-0">
                <li>PHP 8.2 or newer</li>
                <li>Composer</li>
                <li>Laravel-compatible local server</li>
                <li>Modern browser with ES module support</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="surface-plain p-3 h-100">
              <h3 class="h6 fw-semibold mb-3">Quality Commands</h3>
              <pre class="docs-code">php artisan test
./vendor/bin/pint --test
php artisan route:list</pre>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-3">
    <div class="col-xl-4">
      <div class="surface p-3 p-md-4 h-100">
        <h2 class="h5 fw-bold mb-3">File Map</h2>
        <div class="d-grid gap-2">
          @foreach ([
            ['resources/views/layouts', 'Application and authentication shells'],
            ['resources/views/partials', 'Sidebar, topbar, and shared chrome'],
            ['resources/views/components', 'Blade components for cards, tables, metrics, filters, badges'],
            ['resources/views/panel', 'Dashboard, commerce, workspace, admin, UI Kit, and documentation pages'],
            ['public/assets/css/app.css', 'Design tokens, component styling, responsive rules'],
            ['public/assets/js/app.js', 'Theme, sidebar, Select2, datatables, charts, toasts'],
            ['app/Support/PanelData.php', 'Navigation, demo data, chart data, documentation data'],
            ['routes/web.php', 'Named routes and legacy redirects'],
          ] as [$path, $desc])
            <div class="surface-plain p-3">
              <code>{{ $path }}</code>
              <div class="small text-secondary mt-1">{{ $desc }}</div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-xl-8">
      <div class="surface p-3 p-md-4">
        <div class="docs-stack">
          @foreach ($sections as $section)
            <section class="docs-section">
              <h3 class="h6 fw-bold docs-section-title">
                <i class="bi {{ $section['icon'] ?? 'bi-journal-text' }}"></i>
                <span>{{ $section['title'] }}</span>
              </h3>
              <ul class="mb-0">
                @foreach ($section['items'] as $item)
                  <li>{{ $item }}</li>
                @endforeach
              </ul>
              @isset($section['code'])
                <pre class="docs-code">{{ $section['code'] }}</pre>
              @endisset
            </section>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
