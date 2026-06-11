@extends('layouts.app')

@section('content')
  <div class="row g-3">
    <div class="col-xl-8">
      <div class="surface p-3 p-md-4">
        <div class="d-flex flex-wrap justify-content-between gap-2 align-items-center mb-4">
          <div>
            <h2 class="h5 fw-bold mb-1">Workspace Settings</h2>
            <div class="small text-secondary">Manage application profile, security, notifications, and integrations</div>
          </div>
          <div class="page-actions">
            <button class="btn btn-outline-primary"><i class="bi bi-arrow-counterclockwise me-1"></i><span>Reset</span></button>
            <button class="btn btn-primary"><i class="bi bi-save me-1"></i><span>Save</span></button>
          </div>
        </div>
        <ul class="nav nav-pills mb-4" role="tablist">
          @foreach (['general' => 'General', 'security' => 'Security', 'notifications' => 'Notifications', 'integration' => 'Integration', 'billing' => 'Billing'] as $id => $label)
            <li class="nav-item"><button class="nav-link @if($loop->first) active @endif" data-bs-toggle="pill" data-bs-target="#{{ $id }}" type="button">{{ $label }}</button></li>
          @endforeach
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="general">
            <h2 class="h5 fw-bold mb-3">Application Profile</h2>
            <div class="row g-3">
              <div class="col-md-6"><label class="form-label">Application Name</label><input class="form-control" value="Solusite Admin"></div>
              <div class="col-md-6"><label class="form-label">Timezone</label><select class="form-select" data-control="select2"><option selected>America/New_York</option><option>UTC</option><option>Asia/Singapore</option></select></div>
              <div class="col-md-6"><label class="form-label">Locale</label><select class="form-select" data-control="select2"><option selected>en-US</option><option>en-GB</option><option>en-SG</option></select></div>
              <div class="col-md-6"><label class="form-label">Notification Email</label><input class="form-control" value="ops@example.com"></div>
              <div class="col-12"><label class="form-label">Active Modules</label><select class="form-select" multiple data-control="select2" data-placeholder="Select modules"><option selected>Dashboard</option><option selected>Orders</option><option selected>Products</option><option selected>Users</option><option>Billing</option><option>Audit Log</option></select></div>
            </div>
          </div>
          <div class="tab-pane fade" id="security">
            <h2 class="h5 fw-bold mb-3">Security Policy</h2>
            <div class="d-grid gap-3">
              @foreach ([['Require MFA', 'All admins must use an additional authentication factor', true], ['Session Timeout', 'Automatically log out after 30 minutes of inactivity', true], ['IP Allowlist', 'Restrict access to approved office networks', false]] as [$label, $description, $checked])
                <div class="d-flex justify-content-between align-items-center border-bottom pb-3">
                  <div><strong>{{ $label }}</strong><div class="small text-secondary">{{ $description }}</div></div>
                  <div class="form-check form-switch"><input class="form-check-input" type="checkbox" @checked($checked)></div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="tab-pane fade" id="notifications">
            <h2 class="h5 fw-bold mb-3">Notification Preferences</h2>
            <div class="mb-4">
              <div class="small fw-bold text-secondary text-uppercase mb-3" style="letter-spacing:.05em">Email Alerts</div>
              <div class="d-grid gap-3">
                @foreach ([
                  ['New Order', 'Receive an email for every new incoming order', true],
                  ['Low Stock', 'Alert when a product stock falls below threshold', true],
                  ['Failed Payment', 'Notify on payment gateway failures', true],
                  ['Daily Digest', 'Summary of activity sent every morning at 07:00', false],
                  ['Weekly Report', 'Revenue and operations report every Monday', false],
                ] as [$label, $description, $checked])
                  <div class="d-flex justify-content-between align-items-center border-bottom pb-3">
                    <div><strong>{{ $label }}</strong><div class="small text-secondary">{{ $description }}</div></div>
                    <div class="form-check form-switch mb-0"><input class="form-check-input" type="checkbox" @checked($checked)></div>
                  </div>
                @endforeach
              </div>
            </div>
            <div>
              <div class="small fw-bold text-secondary text-uppercase mb-3" style="letter-spacing:.05em">In-App Notifications</div>
              <div class="d-grid gap-3">
                @foreach ([
                  ['Order Updates', 'Status changes shown in notification center', true],
                  ['User Activity', 'Login events and role changes', false],
                  ['System Alerts', 'API errors, queue failures, downtime', true],
                ] as [$label, $description, $checked])
                  <div class="d-flex justify-content-between align-items-center border-bottom pb-3">
                    <div><strong>{{ $label }}</strong><div class="small text-secondary">{{ $description }}</div></div>
                    <div class="form-check form-switch mb-0"><input class="form-check-input" type="checkbox" @checked($checked)></div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="integration">
            <h2 class="h5 fw-bold mb-3">API and Webhooks</h2>
            <div class="row g-3">
              <div class="col-12"><label class="form-label">Public API Key</label><div class="input-group"><input class="form-control" value="pk_live_8B91A2C44F" readonly><button class="btn btn-outline-primary"><i class="bi bi-copy"></i></button></div></div>
              <div class="col-12"><label class="form-label">Webhook URL</label><input class="form-control" value="https://example.com/webhooks/orders"></div>
              <div class="col-12"><label class="form-label">Events</label><select class="form-select" multiple data-control="select2" data-placeholder="Select events"><option selected>order.created</option><option selected>payment.paid</option><option>stock.low</option><option>user.invited</option></select></div>
            </div>
          </div>
          <div class="tab-pane fade" id="billing">
            <h2 class="h5 fw-bold mb-3">Plan</h2>
            <div class="surface-plain p-3">
              <div class="d-flex justify-content-between align-items-center mb-2"><strong>Enterprise</strong><x-badge tone="success">Active</x-badge></div>
              <div class="small text-secondary mb-3">Renewal on May 30, 2026. Invoices are sent automatically to finance@example.com.</div>
              <button class="btn btn-outline-primary"><i class="bi bi-receipt me-1"></i>View Invoice</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="surface p-3 p-md-4 mb-3">
        <h2 class="h5 fw-bold mb-3">System Health</h2>
        @foreach ([['API Latency', '124ms', 38], ['Queue Usage', '62%', 62], ['Storage', '78%', 78]] as [$label, $value, $percent])
          <div class="mb-3"><div class="d-flex justify-content-between small mb-1"><span>{{ $label }}</span><strong>{{ $value }}</strong></div><div class="progress-thin"><span style="width: {{ $percent }}%"></span></div></div>
        @endforeach
      </div>
      <div class="surface p-3 p-md-4">
        <h2 class="h5 fw-bold mb-3">Theme</h2>
        <p class="small text-secondary">The interface follows the saved theme preference and can be changed manually.</p>
        <button class="btn btn-outline-primary" type="button" data-theme-toggle><i class="bi bi-moon-stars me-1"></i>Toggle Dark Mode</button>
      </div>
    </div>
  </div>
@endsection
