@extends('layouts.app')

@section('content')

{{-- Masonry grid --}}
<div class="uk-masonry mb-3">

  {{-- Typography --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Typography</h2>
    <div class="mb-4">
      <div class="text-secondary small mb-2">Headings — fw-500</div>
      <h1 class="mb-1">Heading 1</h1>
      <h2 class="mb-1">Heading 2</h2>
      <h3 class="mb-1">Heading 3</h3>
      <h4 class="mb-1">Heading 4</h4>
      <h5 class="mb-1">Heading 5</h5>
      <h6 class="mb-3">Heading 6</h6>
    </div>
    <div>
      <div class="text-secondary small mb-2">Body &amp; utilities</div>
      <p class="mb-1">Body — regular 1rem / 400</p>
      <p class="mb-1 fw-medium">Medium — fw-medium</p>
      <p class="mb-1 fw-semibold">Semibold — fw-semibold</p>
      <p class="mb-1 fw-bold">Bold — fw-bold</p>
      <p class="mb-1 text-secondary">Muted / secondary</p>
      <p class="mb-1 small">Small — .small</p>
      <p class="mb-0"><a href="#">Link text</a> · <code>inline code</code></p>
    </div>
  </div>

  {{-- Design Tokens --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Design Tokens</h2>
    <div class="d-flex flex-column gap-2">
      @foreach ([
        ['--app-radius',            '.571rem'],
        ['--app-radius-sm',         '.429rem'],
        ['--app-control-height',    '3rem'],
        ['--app-control-height-sm', '2.286rem'],
        ['--app-control-height-lg', '3.714rem'],
        ['--app-icon-size',         '3rem'],
        ['--app-icon-size-sm',      '2.143rem'],
        ['--app-check-size',        '1.143rem'],
        ['--app-font-size-base',    '1rem (14px)'],
        ['--app-font-size-sm',      '.875rem (12.25px)'],
      ] as [$token, $value])
        <div class="d-flex justify-content-between align-items-center py-1 border-bottom gap-3">
          <code class="small text-primary">{{ $token }}</code>
          <span class="text-secondary small text-nowrap">{{ $value }}</span>
        </div>
      @endforeach
    </div>
  </div>

  {{-- Color Palette --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Color Palette</h2>
    <div class="d-flex flex-column gap-2">
      @foreach ([
        ['Blue',      '--app-blue'],
        ['Blue Strong','--app-blue-strong'],
        ['Blue Soft', '--app-blue-soft'],
        ['Green',     '--app-green'],
        ['Amber',     '--app-amber'],
        ['Red',       '--app-red'],
        ['Sky',       '--app-sky'],
        ['Text',      '--app-text'],
        ['Muted',     '--app-muted'],
        ['BG',        '--app-bg'],
        ['Surface',   '--app-surface'],
        ['Surface 2', '--app-surface-2'],
        ['Surface 3', '--app-surface-3'],
        ['Border',    '--app-border'],
      ] as [$label, $token])
        <div class="d-flex align-items-center gap-3">
          <span class="d-block rounded shrink-0" style="width:2.286rem;height:2.286rem;background:var({{ $token }});border:1px solid var(--app-border)"></span>
          <div class="small min-w-0">
            <strong>{{ $label }}</strong>
            <div class="text-secondary font-monospace">{{ $token }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  {{-- Buttons Variants --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Buttons — Variants</h2>
    <div class="d-flex flex-wrap gap-2 mb-3">
      <button class="btn btn-primary">Primary</button>
      <button class="btn btn-secondary">Secondary</button>
      <button class="btn btn-success">Success</button>
      <button class="btn btn-danger">Danger</button>
      <button class="btn btn-warning">Warning</button>
      <button class="btn btn-info">Info</button>
      <button class="btn btn-dark">Dark</button>
      <button class="btn btn-light">Light</button>
    </div>
    <div class="d-flex flex-wrap gap-2">
      <button class="btn btn-outline-primary">Primary</button>
      <button class="btn btn-outline-secondary">Secondary</button>
      <button class="btn btn-outline-success">Success</button>
      <button class="btn btn-outline-danger">Danger</button>
      <button class="btn btn-outline-warning">Warning</button>
      <button class="btn btn-outline-info">Info</button>
      <button class="btn btn-outline-dark">Dark</button>
    </div>
  </div>

  {{-- Button Sizes --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Buttons — Sizes &amp; States</h2>
    <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
      <button class="btn btn-primary btn-lg"><i class="bi bi-plus me-1"></i>Large</button>
      <button class="btn btn-primary"><i class="bi bi-plus me-1"></i>Default</button>
      <button class="btn btn-primary btn-sm"><i class="bi bi-plus me-1"></i>Small</button>
    </div>
    <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
      <button class="btn btn-outline-primary toolbar-icon" aria-label="Icon"><i class="bi bi-bell"></i></button>
      <button class="btn btn-outline-primary toolbar-icon toolbar-icon-sm" aria-label="Small icon"><i class="bi bi-bell"></i></button>
      <button class="btn btn-primary" disabled>Disabled</button>
      <button class="btn btn-outline-primary" disabled>Disabled outline</button>
    </div>
    <div class="d-grid">
      <button class="btn btn-primary">Full width</button>
    </div>
  </div>

  {{-- Badges & Alerts --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Badges &amp; Alerts</h2>
    <div class="mb-3">
      <div class="text-secondary small mb-2">Bootstrap badges</div>
      <div class="d-flex flex-wrap gap-2">
        <span class="badge bg-primary">Primary</span>
        <span class="badge bg-secondary">Secondary</span>
        <span class="badge bg-success">Success</span>
        <span class="badge bg-danger">Danger</span>
        <span class="badge bg-warning text-dark">Warning</span>
        <span class="badge bg-info text-dark">Info</span>
        <span class="badge bg-dark">Dark</span>
        <span class="badge bg-light text-dark">Light</span>
      </div>
    </div>
    <div class="mb-4">
      <div class="text-secondary small mb-2">Soft badges (panel style)</div>
      <div class="d-flex flex-wrap gap-2">
        <x-badge>Info</x-badge>
        <x-badge tone="success">Success</x-badge>
        <x-badge tone="warning">Warning</x-badge>
        <x-badge tone="danger">Danger</x-badge>
      </div>
    </div>
    <div class="d-flex flex-column gap-2">
      <div class="alert alert-primary mb-0 py-2"><i class="bi bi-info-circle me-2"></i>Primary — informational.</div>
      <div class="alert alert-success mb-0 py-2"><i class="bi bi-check-circle me-2"></i>Success — completed.</div>
      <div class="alert alert-warning mb-0 py-2"><i class="bi bi-exclamation-triangle me-2"></i>Warning — review first.</div>
      <div class="alert alert-danger mb-0 py-2"><i class="bi bi-x-circle me-2"></i>Danger — something went wrong.</div>
    </div>
  </div>

  {{-- Text Inputs --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Text Inputs</h2>
    <div class="d-grid gap-3">
      <div>
        <label class="form-label" for="ui-text">Default input</label>
        <input class="form-control" id="ui-text" type="text" placeholder="Enter value">
      </div>
      <div>
        <label class="form-label" for="ui-icon">With icon prefix</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-search"></i></span>
          <input class="form-control" id="ui-icon" type="search" placeholder="Search…">
        </div>
      </div>
      <div>
        <label class="form-label" for="ui-suffix">With button suffix</label>
        <div class="input-group">
          <input class="form-control" id="ui-suffix" type="text" placeholder="Enter URL">
          <button class="btn btn-outline-primary" type="button">Copy</button>
        </div>
      </div>
      <div>
        <label class="form-label" for="ui-pass">Password</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock"></i></span>
          <input class="form-control" id="ui-pass" type="password" placeholder="Password">
          <button class="btn btn-outline-primary" type="button" data-password-toggle="#ui-pass" aria-label="Show"><i class="bi bi-eye"></i></button>
        </div>
      </div>
      <div>
        <label class="form-label" for="ui-ta">Textarea</label>
        <textarea class="form-control" id="ui-ta" rows="3" placeholder="Write something…" style="min-height:unset"></textarea>
      </div>
      <div>
        <label class="form-label" for="ui-range">Range — <span id="rangeVal">50</span></label>
        <input class="form-range" id="ui-range" type="range" min="0" max="100" value="50"
          oninput="document.getElementById('rangeVal').textContent=this.value">
      </div>
    </div>
  </div>

  {{-- Select & Controls --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Select &amp; Controls</h2>
    <div class="d-grid gap-3">
      <div>
        <label class="form-label" for="ui-native">Native select</label>
        <select class="form-select" id="ui-native">
          <option selected>Operations</option>
          <option>Finance</option>
          <option>Support</option>
          <option>Marketing</option>
        </select>
      </div>
      <div>
        <label class="form-label">Select2 — single</label>
        <select class="form-select" data-control="select2" data-placeholder="Choose department">
          <option></option>
          <option>Operations</option>
          <option>Finance</option>
          <option>Support</option>
          <option>Marketing</option>
        </select>
      </div>
      <div>
        <label class="form-label">Select2 — multiple</label>
        <select class="form-select" multiple data-control="select2" data-placeholder="Choose tags">
          <option>Design</option>
          <option>Backend</option>
          <option>Frontend</option>
          <option>DevOps</option>
        </select>
      </div>
      <div>
        <label class="form-label d-block">Checkboxes</label>
        @foreach (['Orders', 'Products', 'Reports'] as $opt)
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="chk-{{ $loop->index }}" {{ $loop->first ? 'checked' : '' }}>
            <label class="form-check-label" for="chk-{{ $loop->index }}">{{ $opt }}</label>
          </div>
        @endforeach
      </div>
      <div>
        <label class="form-label d-block">Radio</label>
        @foreach (['Admin', 'Editor', 'Viewer'] as $role)
          <div class="form-check">
            <input class="form-check-input" type="radio" name="uiRole" id="role-{{ $loop->index }}" {{ $loop->first ? 'checked' : '' }}>
            <label class="form-check-label" for="role-{{ $loop->index }}">{{ $role }}</label>
          </div>
        @endforeach
      </div>
      <div>
        <label class="form-label d-block">Switches</label>
        @foreach (['Email notifications', 'SMS alerts', 'Marketing'] as $sw)
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="sw-{{ $loop->index }}" {{ $loop->first ? 'checked' : '' }}>
            <label class="form-check-label" for="sw-{{ $loop->index }}">{{ $sw }}</label>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  {{-- Validation --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Validation &amp; Disabled</h2>
    <div class="d-grid gap-3 mb-4">
      <div>
        <label class="form-label" for="ui-valid">Valid input</label>
        <input class="form-control is-valid" id="ui-valid" type="text" value="admin@example.com">
        <div class="valid-feedback">Looks good!</div>
      </div>
      <div>
        <label class="form-label" for="ui-invalid">Invalid input</label>
        <input class="form-control is-invalid" id="ui-invalid" type="text" value="not-an-email">
        <div class="invalid-feedback">Enter a valid email address.</div>
      </div>
      <div>
        <label class="form-label" for="ui-inv-sel">Invalid select</label>
        <select class="form-select is-invalid" id="ui-inv-sel">
          <option selected value="">Choose one</option>
        </select>
        <div class="invalid-feedback">Please select an option.</div>
      </div>
    </div>
    <div class="text-secondary small fw-bold mb-2">Disabled states</div>
    <div class="d-grid gap-3">
      <input class="form-control" type="text" value="Disabled input" disabled>
      <select class="form-select" disabled><option>Disabled select</option></select>
      <div class="input-group kit-toolbar-search">
        <input class="form-control" type="text" placeholder="Read-only" readonly>
        <button class="btn btn-outline-primary" type="button" disabled>Submit</button>
      </div>
    </div>
  </div>

  {{-- Progress Bars --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Progress Bars</h2>
    <div class="d-flex flex-column gap-3">
      @foreach ([
        ['Operations',       84, 'primary'],
        ['SLA Compliance',   94, 'success'],
        ['Stock Health',     72, 'warning'],
        ['Overdue Invoices', 28, 'danger'],
        ['User Adoption',    61, 'info'],
      ] as [$label, $pct, $tone])
        <div>
          <div class="d-flex justify-content-between small mb-1"><span>{{ $label }}</span><span>{{ $pct }}%</span></div>
          <div class="progress" style="height:.571rem">
            <div class="progress-bar bg-{{ $tone }}" style="width:{{ $pct }}%" role="progressbar"
                 aria-valuenow="{{ $pct }}" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      @endforeach
      <div>
        <div class="small mb-1">Striped &amp; animated</div>
        <div class="progress" style="height:.571rem">
          <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" style="width:65%"></div>
        </div>
      </div>
      <div>
        <div class="small mb-1">Multi-segment</div>
        <div class="progress" style="height:.571rem">
          <div class="progress-bar bg-primary" style="width:38%"></div>
          <div class="progress-bar bg-success" style="width:25%"></div>
          <div class="progress-bar bg-warning" style="width:18%"></div>
          <div class="progress-bar bg-danger" style="width:12%"></div>
        </div>
      </div>
    </div>
  </div>

  {{-- Avatars --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Avatars &amp; Indicators</h2>
    <div class="mb-4">
      <div class="text-secondary small mb-2">Sizes</div>
      <div class="d-flex align-items-end gap-3">
        @foreach ([['avatar-lg', 'Large'], ['avatar', 'Default'], ['avatar-sm', 'Small']] as [$cls, $lbl])
          <div class="text-center">
            <span class="avatar {{ $cls }} mb-1">AD</span>
            <div class="small text-secondary">{{ $lbl }}</div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="mb-4">
      <div class="text-secondary small mb-2">Stacked group</div>
      <div class="d-flex">
        @foreach (['AR', 'SN', 'BP', 'LM', '+4'] as $i => $init)
          <span class="avatar avatar-sm" style="margin-left:{{ $i > 0 ? '-.571rem' : '0' }};z-index:{{ 5 - $i }}">{{ $init }}</span>
        @endforeach
      </div>
    </div>
    <div>
      <div class="text-secondary small mb-2">With badge &amp; status</div>
      <div class="d-flex align-items-center gap-4">
        <div class="position-relative d-inline-block">
          <span class="avatar">AD</span>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
        </div>
        <div class="position-relative d-inline-block">
          <span class="avatar">SN</span>
          <span class="position-absolute bottom-0 end-0 translate-middle p-1 bg-success border border-white rounded-circle" style="width:.857rem;height:.857rem"></span>
        </div>
      </div>
    </div>
  </div>

  {{-- Toast --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Toast Notifications</h2>
    <div class="d-flex flex-column gap-2">
      <button class="btn btn-outline-primary"
        data-toast data-toast-type="info"
        data-toast-title="Information"
        data-toast-message="This is an informational notification.">
        <i class="bi bi-info-circle me-2"></i>Info toast
      </button>
      <button class="btn btn-outline-success"
        data-toast data-toast-type="success"
        data-toast-title="Success"
        data-toast-message="Your changes have been saved.">
        <i class="bi bi-check-circle me-2"></i>Success toast
      </button>
      <button class="btn btn-outline-warning"
        data-toast data-toast-type="warning"
        data-toast-title="Warning"
        data-toast-message="Please review your inputs.">
        <i class="bi bi-exclamation-triangle me-2"></i>Warning toast
      </button>
      <button class="btn btn-outline-danger"
        data-toast data-toast-type="danger"
        data-toast-title="Error"
        data-toast-message="Something went wrong. Please try again.">
        <i class="bi bi-x-circle me-2"></i>Danger toast
      </button>
    </div>
  </div>

  {{-- Dropdowns --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Dropdowns</h2>
    <div class="d-flex flex-wrap gap-2">
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">Actions</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Edit</a></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-copy me-2"></i>Duplicate</a></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-share me-2"></i>Share</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Delete</a></li>
        </ul>
      </div>
      <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">Status</button>
        <ul class="dropdown-menu">
          @foreach (['Active' => 'success', 'Pending' => 'warning', 'Locked' => 'danger'] as $s => $t)
            <li><a class="dropdown-item" href="#"><x-badge :tone="$t">{{ $s }}</x-badge></a></li>
          @endforeach
        </ul>
      </div>
      <div class="dropdown">
        <button class="btn btn-outline-primary toolbar-icon dropdown-toggle" data-bs-toggle="dropdown" aria-label="More"><i class="bi bi-three-dots-vertical"></i></button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#"><i class="bi bi-download me-2"></i>Export CSV</a></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-printer me-2"></i>Print</a></li>
        </ul>
      </div>
    </div>
  </div>

  {{-- Modals --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Modals</h2>
    <div class="d-flex flex-wrap gap-2">
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kitModal">Launch modal</button>
      <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#kitConfirm">Confirm delete</button>
    </div>
    <div class="modal fade" id="kitModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Create new record</h5>
            <button class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3"><label class="form-label">Name</label><input class="form-control" placeholder="Enter name"></div>
            <div class="mb-3"><label class="form-label">Role</label>
              <select class="form-select" data-control="select2" data-placeholder="Choose role">
                <option></option><option>Admin</option><option>Editor</option><option>Viewer</option>
              </select>
            </div>
            <div class="mb-0"><label class="form-label">Notes</label><textarea class="form-control" rows="3" style="min-height:unset" placeholder="Optional notes"></textarea></div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" data-bs-dismiss="modal">Save record</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="kitConfirm" tabindex="-1">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body text-center py-4">
            <div class="mb-3"><i class="bi bi-trash3 text-danger" style="font-size:2rem"></i></div>
            <h5 class="fw-bold mb-1">Delete record?</h5>
            <p class="text-secondary small mb-4">This action cannot be undone.</p>
            <div class="d-flex gap-2">
              <button class="btn btn-outline-primary flex-fill" data-bs-dismiss="modal">Cancel</button>
              <button class="btn btn-danger flex-fill" data-bs-dismiss="modal">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Tooltips & Navigation --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Tooltips &amp; Navigation</h2>
    <div class="d-flex flex-wrap gap-2 mb-4">
      <button class="btn btn-outline-primary" data-bs-toggle="tooltip" title="Helpful tooltip">Hover me</button>
      <button class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top">Top</button>
      <button class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Bottom">Bottom</button>
    </div>
    <div class="mb-4">
      <div class="text-secondary small mb-2">Breadcrumb</div>
      <nav><ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Settings</a></li>
        <li class="breadcrumb-item active">UI Kit</li>
      </ol></nav>
    </div>
    <div>
      <div class="text-secondary small mb-2">Pagination</div>
      <nav><ul class="pagination mb-0">
        <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">»</a></li>
      </ul></nav>
    </div>
  </div>

  {{-- Accordion & Nav --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Accordion &amp; Nav Pills</h2>
    <ul class="nav nav-pills mb-4">
      <li class="nav-item"><button class="nav-link active" type="button">Overview</button></li>
      <li class="nav-item"><button class="nav-link" type="button">Activity</button></li>
      <li class="nav-item"><button class="nav-link" type="button">Settings</button></li>
    </ul>
    <div class="accordion" id="kitAccordion">
      @foreach ([
        ['Components', 'Buttons, forms, badges, tables, modals, and reusable Blade components.'],
        ['Assets',     'CSS tokens, JavaScript behavior, Select2, charts, and datatable init.'],
        ['Customize',  'Update tokens, navigation data, route names, demo data, and page copy.'],
      ] as [$kitTitle, $body])
        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
              data-bs-toggle="collapse" data-bs-target="#kitAcc{{ $loop->index }}">
              {{ $kitTitle }}
            </button>
          </h3>
          <div id="kitAcc{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#kitAccordion">
            <div class="accordion-body text-secondary">{{ $body }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  {{-- List Group --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">List Group</h2>
    <div class="list-group">
      <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active" href="#">
        <span><i class="bi bi-inbox me-2"></i>Inbox</span><span class="badge bg-light text-dark">12</span>
      </a>
      <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="#">
        <span><i class="bi bi-send me-2"></i>Sent</span><span class="text-secondary small">24</span>
      </a>
      <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="#">
        <span><i class="bi bi-star me-2"></i>Starred</span><span class="text-secondary small">8</span>
      </a>
      <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="#">
        <span><i class="bi bi-archive me-2"></i>Archive</span><span class="text-secondary small">103</span>
      </a>
    </div>
  </div>

  {{-- Timeline --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Timeline</h2>
    <div class="timeline">
      @foreach ([
        ['bi-check2-circle', 'Order fulfilled',  'Warehouse completed packing 4 minutes ago'],
        ['bi-credit-card',   'Payment captured', 'Stripe charge confirmed successfully'],
        ['bi-person-plus',   'User invited',     'Finance manager invitation sent to inbox'],
        ['bi-shield-check',  'MFA enabled',      'Two-factor authentication activated'],
      ] as [$icon, $activityTitle, $desc])
        <div class="timeline-item">
          <span class="timeline-icon"><i class="bi {{ $icon }}"></i></span>
          <div>
            <div class="fw-semibold">{{ $activityTitle }}</div>
            <div class="small text-secondary">{{ $desc }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  {{-- Empty & Loading --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Empty &amp; Loading States</h2>
    <div class="kit-empty-state mb-4">
      <span class="kit-tile-icon mb-3"><i class="bi bi-inbox"></i></span>
      <h3 class="h6 fw-semibold mb-1">No records found</h3>
      <p class="small text-secondary mb-3">Adjust filters or create a new record.</p>
      <button class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i>Add Record</button>
    </div>
    <div class="text-secondary small fw-bold mb-2">Skeleton loaders</div>
    <div class="d-grid gap-3 mb-3">
      @foreach ([100, 86, 64] as $width)
        <div>
          <div class="kit-skeleton is-loading mb-2" style="width:{{ $width }}%"></div>
          <div class="kit-skeleton is-loading" style="width:{{ max($width - 24, 40) }}%;min-height:.65rem"></div>
        </div>
      @endforeach
    </div>
    <div class="d-flex align-items-center gap-2 small text-secondary">
      <span class="spinner-border spinner-border-sm text-primary" aria-hidden="true"></span>
      Syncing records…
    </div>
  </div>

  {{-- Stepper --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Stepper</h2>
    <div class="kit-stepper">
      @foreach ([
        ['Profile',     'Collect account identity and role data.'],
        ['Permissions', 'Assign modules and access levels.'],
        ['Review',      'Confirm settings before sending invitation.'],
      ] as [$stepTitle, $desc])
        <div class="kit-step">
          <span class="kit-step-number">{{ $loop->iteration }}</span>
          <div>
            <div class="fw-semibold">{{ $stepTitle }}</div>
            <div class="small text-secondary">{{ $desc }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  {{-- Status & Keyboard --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Status &amp; Keyboard</h2>
    <div class="d-flex flex-column gap-2 mb-4">
      <x-status-dot tone="success">Online — Active session</x-status-dot>
      <x-status-dot tone="warning">Pending review</x-status-dot>
      <x-status-dot tone="danger">Action required</x-status-dot>
      <x-status-dot>Offline</x-status-dot>
    </div>
    <div class="text-secondary small fw-bold mb-2">Keyboard shortcuts</div>
    <div class="d-flex flex-wrap gap-2">
      <span class="kbd-key">Ctrl</span>
      <span class="kbd-key">K</span>
      <span class="kbd-key">Shift</span>
      <span class="kbd-key">Enter</span>
      <span class="kbd-key">Esc</span>
      <span class="kbd-key">⌘</span>
    </div>
  </div>

  {{-- Metric Patterns --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Metric Patterns</h2>
    <div class="kit-grid">
      @foreach ([
        ['Orders', '$48.2K', 'bi-bag-check', 'success', '+18%'],
        ['Refunds', '2.4%', 'bi-arrow-counterclockwise', 'warning', '-0.6%'],
        ['Risk', '14', 'bi-shield-exclamation', 'danger', '+3'],
      ] as [$label, $value, $icon, $tone, $trend])
        <div class="kit-tile">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <span class="kit-tile-icon text-{{ $tone }}"><i class="bi {{ $icon }}"></i></span>
            <x-badge :tone="$tone">{{ $trend }}</x-badge>
          </div>
          <div class="text-secondary small">{{ $label }}</div>
          <div class="h4 fw-bold mb-0">{{ $value }}</div>
        </div>
      @endforeach
    </div>
  </div>

  {{-- Action Toolbar --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Action Toolbar</h2>
    <div class="kit-toolbar mb-3">
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-search"></i></span>
        <input class="form-control" type="search" placeholder="Search records">
      </div>
      <select class="form-select kit-toolbar-select">
        <option>Status</option>
        <option>Active</option>
        <option>Pending</option>
      </select>
      <button class="btn btn-outline-primary toolbar-icon" aria-label="Filter"><i class="bi bi-funnel"></i></button>
      <button class="btn btn-primary kit-toolbar-action"><i class="bi bi-plus-lg me-1"></i>Create</button>
    </div>
    <div class="d-flex flex-wrap gap-2">
      <button class="btn btn-outline-primary btn-sm"><i class="bi bi-download me-1"></i>Export</button>
      <button class="btn btn-outline-primary btn-sm"><i class="bi bi-upload me-1"></i>Import</button>
      <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash me-1"></i>Bulk Delete</button>
    </div>
  </div>

  {{-- Filter Chips --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Filter Chips</h2>
    <div class="d-flex flex-wrap gap-2 mb-3">
      @foreach (['Paid', 'Pending', 'High value', 'Last 30 days', 'Assigned to me'] as $chip)
        <button class="kit-chip" type="button">{{ $chip }} <i class="bi bi-x"></i></button>
      @endforeach
    </div>
    <div class="d-flex flex-wrap gap-2">
      <button class="kit-chip active" type="button"><i class="bi bi-check2"></i>Active</button>
      <button class="kit-chip" type="button"><i class="bi bi-clock"></i>Scheduled</button>
      <button class="kit-chip" type="button"><i class="bi bi-archive"></i>Archived</button>
    </div>
  </div>

  {{-- File Upload --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">File Upload</h2>
    <label class="kit-dropzone mb-3" for="kit-file">
      <input id="kit-file" class="visually-hidden" type="file">
      <span class="kit-tile-icon mb-3"><i class="bi bi-cloud-arrow-up"></i></span>
      <span class="fw-semibold">Drop files here or browse</span>
      <span class="small text-secondary">PNG, JPG, PDF up to 10 MB</span>
    </label>
    <div class="d-grid gap-2">
      @foreach ([
        ['invoice-april.pdf', '2.4 MB', 'bi-file-earmark-pdf'],
        ['product-photo.png', '840 KB', 'bi-file-earmark-image'],
      ] as [$file, $size, $icon])
        <div class="kit-file-row">
          <i class="bi {{ $icon }} text-primary"></i>
          <div class="min-w-0 flex-fill">
            <div class="fw-semibold text-truncate small">{{ $file }}</div>
            <div class="text-secondary small">{{ $size }}</div>
          </div>
          <button class="btn btn-sm btn-outline-secondary toolbar-icon-sm" aria-label="Remove file"><i class="bi bi-x"></i></button>
        </div>
      @endforeach
    </div>
  </div>

  {{-- Command Search --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Command Search</h2>
    <div class="kit-command">
      <div class="input-group mb-2">
        <span class="input-group-text"><i class="bi bi-command"></i></span>
        <input class="form-control" placeholder="Type a command or search...">
        <span class="input-group-text"><span class="kbd-key">Ctrl K</span></span>
      </div>
      <div class="kit-command-list">
        @foreach ([
          ['Create order', 'Open order composer', 'bi-plus-circle'],
          ['Invite user', 'Send workspace invitation', 'bi-person-plus'],
          ['Export report', 'Download current analytics', 'bi-download'],
        ] as [$cmd, $desc, $icon])
          <button class="kit-command-item" type="button">
            <span class="kit-command-icon"><i class="bi {{ $icon }}"></i></span>
            <span class="min-w-0 text-start">
              <span class="d-block fw-semibold">{{ $cmd }}</span>
              <span class="d-block small text-secondary">{{ $desc }}</span>
            </span>
          </button>
        @endforeach
      </div>
    </div>
  </div>

  {{-- Offcanvas --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Offcanvas Panel</h2>
    <p class="text-secondary small mb-3">Useful for filters, carts, notifications, and detail drawers.</p>
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#kitOffcanvas">
      <i class="bi bi-layout-sidebar-inset-reverse me-1"></i>Open panel
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="kitOffcanvas">
      <div class="offcanvas-header">
        <div>
          <h5 class="offcanvas-title fw-bold">Order Filters</h5>
          <div class="small text-secondary">Refine records quickly</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="d-grid gap-3">
          <div><label class="form-label">Status</label><select class="form-select"><option>All</option><option>Paid</option><option>Pending</option></select></div>
          <div><label class="form-label">Date range</label><input class="form-control" value="Apr 1 - Apr 30, 2026"></div>
          <div class="form-check form-switch"><input class="form-check-input" id="kit-owned" type="checkbox" checked><label class="form-check-label" for="kit-owned">Assigned to me</label></div>
          <button class="btn btn-primary">Apply filters</button>
        </div>
      </div>
    </div>
  </div>

  {{-- Banners --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Banners</h2>
    <div class="d-grid gap-3">
      <div class="kit-banner">
        <i class="bi bi-rocket-takeoff"></i>
        <div class="min-w-0">
          <div class="fw-semibold">New release available</div>
          <div class="small text-secondary">Version 1.2.0 includes dashboard improvements.</div>
        </div>
        <button class="btn btn-primary btn-sm ms-auto">Update</button>
      </div>
      <div class="kit-banner warning">
        <i class="bi bi-exclamation-triangle"></i>
        <div>
          <div class="fw-semibold">Storage almost full</div>
          <div class="small text-secondary">Delete old exports or upgrade your plan.</div>
        </div>
      </div>
      <div class="kit-banner danger">
        <i class="bi bi-shield-x"></i>
        <div>
          <div class="fw-semibold">Security review required</div>
          <div class="small text-secondary">Two users have outdated MFA settings.</div>
        </div>
      </div>
    </div>
  </div>

  {{-- Result States --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Result States</h2>
    <div class="d-grid gap-3">
      @foreach ([
        ['success', 'bi-check-circle', 'Payment complete', 'Receipt has been emailed to the customer.'],
        ['warning', 'bi-hourglass-split', 'Approval pending', 'This request is waiting for finance review.'],
        ['danger', 'bi-x-circle', 'Export failed', 'Connection timed out. Try again in a moment.'],
      ] as [$tone, $icon, $stateTitle, $desc])
        <div class="kit-result">
          <span class="kit-result-icon {{ $tone }}"><i class="bi {{ $icon }}"></i></span>
          <div>
            <div class="fw-semibold">{{ $stateTitle }}</div>
            <div class="small text-secondary">{{ $desc }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  {{-- Permission Matrix --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Permission Matrix</h2>
    <div class="kit-permission">
      <div class="kit-permission-row kit-permission-head">
        <span>Module</span><span>View</span><span>Edit</span><span>Delete</span>
      </div>
      @foreach ([
        ['Orders', true, true, false],
        ['Products', true, true, true],
        ['Reports', true, false, false],
        ['Users', true, true, false],
      ] as [$module, $view, $edit, $delete])
        <div class="kit-permission-row">
          <span class="fw-semibold">{{ $module }}</span>
          @foreach ([$view, $edit, $delete] as $enabled)
            <span><i class="bi {{ $enabled ? 'bi-check-circle-fill text-success' : 'bi-dash-circle text-secondary' }}"></i></span>
          @endforeach
        </div>
      @endforeach
    </div>
  </div>

  {{-- Notification Items --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Notification Items</h2>
    <div class="d-grid gap-2">
      @foreach ([
        ['bi-bag-check', 'New order received', 'ORD-12091 from Nadia Putri', '2m', 'success'],
        ['bi-chat-dots', 'New ticket reply', 'Customer replied to SLA thread', '14m', 'primary'],
        ['bi-exclamation-triangle', 'Low stock alert', 'Running socks are below threshold', '1h', 'warning'],
      ] as [$icon, $notifTitle, $desc, $time, $tone])
        <div class="kit-notification">
          <span class="kit-notification-icon {{ $tone }}"><i class="bi {{ $icon }}"></i></span>
          <div class="min-w-0 flex-fill">
            <div class="fw-semibold text-truncate">{{ $notifTitle }}</div>
            <div class="small text-secondary text-truncate">{{ $desc }}</div>
          </div>
          <span class="small text-secondary">{{ $time }}</span>
        </div>
      @endforeach
    </div>
  </div>

  {{-- Activity Feed --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Activity Feed</h2>
    <div class="d-grid gap-3">
      @foreach ([
        ['AR', 'Andy updated product pricing', '2 minutes ago'],
        ['SN', 'Sinta approved shipment batch', '18 minutes ago'],
        ['BP', 'Budi closed support ticket', '1 hour ago'],
      ] as [$initials, $activity, $time])
        <div class="d-flex gap-3">
          <span class="avatar avatar-sm shrink-0">{{ $initials }}</span>
          <div class="min-w-0">
            <div class="fw-semibold small">{{ $activity }}</div>
            <div class="text-secondary small">{{ $time }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  {{-- Inbox / Message --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Message Preview</h2>
    <div class="kit-message">
      <div class="d-flex align-items-start gap-3 mb-3">
        <span class="avatar avatar-sm">NR</span>
        <div class="min-w-0 flex-fill">
          <div class="fw-semibold">Nusantara Retail</div>
          <div class="small text-secondary">finance@nusantara-retail.co</div>
        </div>
        <x-badge tone="success">New</x-badge>
      </div>
      <div class="fw-semibold mb-1">Invoice payment confirmation</div>
      <p class="small text-secondary mb-3">Payment for invoice INV-9041 has been scheduled and will settle tomorrow morning.</p>
      <div class="d-flex gap-2">
        <button class="btn btn-primary btn-sm"><i class="bi bi-reply me-1"></i>Reply</button>
        <button class="btn btn-outline-primary btn-sm"><i class="bi bi-archive me-1"></i>Archive</button>
      </div>
    </div>
  </div>

  {{-- Chat Bubbles --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Chat Bubbles</h2>
    <div class="d-grid gap-2">
      <div class="kit-chat-row">
        <span class="avatar avatar-sm">SN</span>
        <div class="kit-chat-bubble">Packing team needs stock confirmation.</div>
      </div>
      <div class="kit-chat-row own">
        <div class="kit-chat-bubble">Confirmed. 214 units are available.</div>
        <span class="avatar avatar-sm">AD</span>
      </div>
      <div class="input-group mt-2">
        <input class="form-control" placeholder="Write a message">
        <button class="btn btn-primary"><i class="bi bi-send"></i></button>
      </div>
    </div>
  </div>

  {{-- Receipt Summary --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Receipt Summary</h2>
    <div class="kit-receipt">
      <div class="d-flex justify-content-between mb-3">
        <div>
          <div class="fw-bold">INV-9041</div>
          <div class="small text-secondary">Apr 30, 2026</div>
        </div>
        <x-badge tone="success">Paid</x-badge>
      </div>
      @foreach ([['Platform License', '$38,200'], ['Support Add-on', '$6,000'], ['Tax', '$4,000']] as [$label, $amount])
        <div class="kit-receipt-row"><span>{{ $label }}</span><span>{{ $amount }}</span></div>
      @endforeach
      <div class="kit-receipt-total"><span>Total</span><span>$48,200</span></div>
    </div>
  </div>

  {{-- Plan Card --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Plan Card</h2>
    <div class="kit-plan">
      <div class="d-flex justify-content-between align-items-start mb-3">
        <div>
          <div class="h5 fw-bold mb-1">Business</div>
          <div class="text-secondary small">For growing operations teams</div>
        </div>
        <x-badge>Popular</x-badge>
      </div>
      <div class="display-6 fw-bold mb-3">$49<span class="fs-6 text-secondary">/mo</span></div>
      <div class="d-grid gap-2 mb-4">
        @foreach (['Unlimited dashboards', 'Role-based access', 'Priority support'] as $feature)
          <div class="small"><i class="bi bi-check-circle-fill text-success me-2"></i>{{ $feature }}</div>
        @endforeach
      </div>
      <button class="btn btn-primary w-100">Choose plan</button>
    </div>
  </div>

  {{-- Calendar Event --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Calendar Event</h2>
    <div class="kit-event">
      <div class="kit-event-date">
        <span>May</span>
        <strong>06</strong>
      </div>
      <div class="min-w-0 flex-fill">
        <div class="fw-semibold">Operations Review</div>
        <div class="small text-secondary mb-2">10:00 - 11:30 · Meeting Room A</div>
        <div class="d-flex">
          @foreach (['AD', 'SN', 'BP'] as $i => $person)
            <span class="avatar avatar-sm" style="margin-left:{{ $i ? '-.5rem' : 0 }}">{{ $person }}</span>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  {{-- Feature Checklist --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Feature Checklist</h2>
    <div class="d-grid gap-2">
      @foreach ([
        ['Documentation written', true],
        ['Preview screenshots captured', true],
        ['License file added', false],
        ['Release ZIP prepared', false],
      ] as [$task, $done])
        <label class="kit-check-row">
          <input class="form-check-input" type="checkbox" @checked($done)>
          <span class="{{ $done ? 'text-decoration-line-through text-secondary' : '' }}">{{ $task }}</span>
        </label>
      @endforeach
    </div>
  </div>

  {{-- Inline Editor --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Inline Editor</h2>
    <div class="kit-inline-editor">
      <div class="btn-group btn-group-sm mb-3">
        <button class="btn btn-outline-secondary"><i class="bi bi-type-bold"></i></button>
        <button class="btn btn-outline-secondary"><i class="bi bi-type-italic"></i></button>
        <button class="btn btn-outline-secondary"><i class="bi bi-list-ul"></i></button>
        <button class="btn btn-outline-secondary"><i class="bi bi-link-45deg"></i></button>
      </div>
      <textarea class="form-control" rows="4" style="min-height:unset">Customer notes, internal comments, or release notes can use this compact editor pattern.</textarea>
    </div>
  </div>

  {{-- API Key Field --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">API Key Field</h2>
    <label class="form-label">Production key</label>
    <div class="input-group mb-2">
      <span class="input-group-text"><i class="bi bi-key"></i></span>
      <input class="form-control font-monospace" value="sk_live_••••••••••••9241" readonly>
      <button class="btn btn-outline-primary" type="button"><i class="bi bi-copy"></i></button>
    </div>
    <div class="d-flex justify-content-between align-items-center">
      <span class="small text-secondary">Last rotated 8 days ago</span>
      <button class="btn btn-sm btn-outline-danger">Rotate</button>
    </div>
  </div>

  {{-- Data Density --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Data Density</h2>
    <div class="kit-density">
      @foreach ([['Comfortable', '3rem rows'], ['Compact', '2.25rem rows'], ['Expanded', '4rem rows']] as [$mode, $desc])
        <button class="kit-density-option {{ $loop->first ? 'active' : '' }}" type="button">
          <span class="fw-semibold">{{ $mode }}</span>
          <span class="small text-secondary">{{ $desc }}</span>
        </button>
      @endforeach
    </div>
  </div>

  {{-- Integration Card --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Integration Card</h2>
    <div class="kit-integration">
      <span class="kit-tile-icon"><i class="bi bi-stripe"></i></span>
      <div class="min-w-0 flex-fill">
        <div class="fw-semibold">Stripe Payments</div>
        <div class="small text-secondary">Connected · Webhook healthy</div>
      </div>
      <div class="form-check form-switch mb-0">
        <input class="form-check-input" type="checkbox" checked aria-label="Toggle integration">
      </div>
    </div>
    <div class="kit-integration mt-2">
      <span class="kit-tile-icon"><i class="bi bi-slack"></i></span>
      <div class="min-w-0 flex-fill">
        <div class="fw-semibold">Slack Alerts</div>
        <div class="small text-secondary">Not connected</div>
      </div>
      <button class="btn btn-sm btn-outline-primary">Connect</button>
    </div>
  </div>

  {{-- Copy Snippets --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Copy Snippets</h2>
    <div class="d-grid gap-3">
      <div>
        <div class="text-secondary small mb-2">Filter bar</div>
        <pre class="kit-code">&lt;x-filter-bar&gt;
  &lt;input class="form-control" placeholder="Search"&gt;
  &lt;select class="form-select"&gt;...&lt;/select&gt;
  &lt;button class="btn btn-primary"&gt;Apply&lt;/button&gt;
&lt;/x-filter-bar&gt;</pre>
      </div>
      <div>
        <div class="text-secondary small mb-2">Toast action</div>
        <pre class="kit-code">&lt;button data-toast
  data-toast-type="success"
  data-toast-title="Saved"
  data-toast-message="Changes saved."&gt;
  Save
&lt;/button&gt;</pre>
      </div>
    </div>
  </div>

  {{-- Code Snippet --}}
  <div class="surface p-4 uk-card">
    <h2 class="h5 fw-bold mb-4">Usage Snippet</h2>
    <pre class="kit-code">&lt;x-table-card title="Users" subtitle="Manage access"&gt;
  &lt;x-slot:actions&gt;
    &lt;button class="btn btn-outline-primary"&gt;Export&lt;/button&gt;
    &lt;button class="btn btn-primary"&gt;Create&lt;/button&gt;
  &lt;/x-slot:actions&gt;
  &lt;table class="table" data-table&gt;
    ...
  &lt;/table&gt;
&lt;/x-table-card&gt;

&lt;x-badge tone="success"&gt;Active&lt;/x-badge&gt;
&lt;x-status-dot tone="warning"&gt;Pending&lt;/x-status-dot&gt;</pre>
  </div>

</div>

{{-- Data Table — full width outside masonry --}}
<x-table-card title="Data Table" subtitle="Searchable, sortable, paginated — simple-datatables">
  <x-slot:actions>
    <button class="btn btn-outline-primary btn-sm"><i class="bi bi-funnel me-1"></i>Filter</button>
    <button class="btn btn-primary btn-sm"><i class="bi bi-plus me-1"></i>New Row</button>
  </x-slot:actions>
  <table class="table align-middle" data-table>
    <thead>
      <tr>
        <th class="no-sort"><input type="checkbox" class="form-check-input" data-check-all=".row-check"></th>
        <th>Name</th><th>Role</th><th>Team</th><th>Status</th><th>Last Login</th>
      </tr>
    </thead>
    <tbody>
      @foreach ([
        ['Andy Rahman',   'Admin',     'Operations',       'Active',  'success', 'Apr 30, 2026'],
        ['Sinta Nabila',  'Editor',    'Catalog',          'Active',  'success', 'Apr 30, 2026'],
        ['Budi Pratama',  'Support',   'Customer Success', 'Pending', 'warning', 'Apr 29, 2026'],
        ['Lia Maharani',  'Finance',   'Finance',          'Active',  'success', 'Apr 29, 2026'],
        ['Rama Kurnia',   'Warehouse', 'Fulfillment',      'Locked',  'danger',  'Apr 26, 2026'],
        ['Dewi Melati',   'Manager',   'Sales',            'Active',  'success', 'Apr 30, 2026'],
        ['Farhan Dwi',    'Admin',     'Operations',       'Active',  'success', 'Apr 28, 2026'],
        ['Yuni Lestari',  'Editor',    'Catalog',          'Pending', 'warning', 'Apr 27, 2026'],
        ['Hendra Jaya',   'Support',   'Customer Success', 'Active',  'success', 'Apr 25, 2026'],
        ['Kartika Corp.', 'Finance',   'Finance',          'Active',  'success', 'Apr 24, 2026'],
      ] as [$name, $role, $team, $status, $tone, $login])
        <tr>
          <td><input type="checkbox" class="form-check-input row-check"></td>
          <td><strong>{{ $name }}</strong></td>
          <td>{{ $role }}</td>
          <td>{{ $team }}</td>
          <td><x-badge :tone="$tone">{{ $status }}</x-badge></td>
          <td class="text-secondary">{{ $login }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</x-table-card>

@endsection
