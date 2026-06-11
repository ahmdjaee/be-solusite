@extends('layouts.app')

@section('content')
  {{-- Profile Header --}}
  <div class="profile-cover mb-3">
    <div class="profile-cover-banner">
      <div class="profile-cover-kicker">
        <span>Admin Workspace</span>
        <strong>Operations Suite</strong>
      </div>
    </div>
    <div class="profile-identity">
      <div class="profile-avatar-wrap">
        <div class="avatar profile-avatar">AD</div>
        <button class="profile-avatar-upload btn btn-sm btn-primary" title="Upload photo">
          <i class="bi bi-camera-fill"></i>
        </button>
      </div>
      <div class="profile-summary">
        <div class="profile-title-row">
          <h1 class="h4 fw-bold mb-0">Admin Demo</h1>
          <div class="profile-status">
            <x-badge tone="success">MFA Active</x-badge>
            <x-badge tone="info">Enterprise</x-badge>
          </div>
        </div>
        <div class="profile-meta">
          <span><i class="bi bi-shield-check"></i>Super Admin</span>
          <span><i class="bi bi-building"></i>Operations Suite</span>
          <span><i class="bi bi-clock"></i>America/New_York</span>
        </div>
      </div>
      <div class="profile-actions">
        <button class="btn btn-outline-primary btn-sm">
          <i class="bi bi-person-lines-fill me-1"></i>Edit Profile
        </button>
        <button class="btn btn-primary btn-sm">
          <i class="bi bi-save me-1"></i>Save Changes
        </button>
      </div>
    </div>
  </div>

  <div class="row g-3">
    {{-- Main column --}}
    <div class="col-xl-8">
      <div class="surface p-3 p-md-4">
        <ul class="nav nav-pills mb-4" role="tablist">
          @foreach (['account' => 'Account', 'security' => 'Security', 'preferences' => 'Preferences', 'activity' => 'Activity'] as $id => $label)
            <li class="nav-item">
              <button class="nav-link @if($loop->first) active @endif" data-bs-toggle="pill" data-bs-target="#profile-{{ $id }}" type="button">{{ $label }}</button>
            </li>
          @endforeach
        </ul>

        <div class="tab-content">
          {{-- Account --}}
          <div class="tab-pane fade show active" id="profile-account">
            <h2 class="h5 fw-bold mb-3">Account Details</h2>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Full Name</label>
                <input class="form-control" value="Admin Demo">
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" value="admin@example.com">
              </div>
              <div class="col-md-6">
                <label class="form-label">Role</label>
                <input class="form-control" value="Super Admin" readonly>
              </div>
              <div class="col-md-6">
                <label class="form-label">Timezone</label>
                <select class="form-select" data-control="select2">
                  <option selected>America/New_York</option>
                  <option>UTC</option>
                  <option>Asia/Singapore</option>
                  <option>Asia/Jakarta</option>
                  <option>Europe/London</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone</label>
                <input class="form-control" value="+1 800 555 0199">
              </div>
              <div class="col-md-6">
                <label class="form-label">Department</label>
                <select class="form-select" data-control="select2">
                  <option selected>Operations</option>
                  <option>Finance</option>
                  <option>Customer Success</option>
                  <option>Engineering</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Notification Channels</label>
                <select class="form-select" multiple data-control="select2" data-placeholder="Select channels">
                  <option selected>Email</option>
                  <option selected>In App</option>
                  <option>Slack</option>
                  <option>Webhook</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Bio</label>
                <textarea class="form-control" rows="3" placeholder="Brief description about yourself...">Operations team lead managing logistics and platform analytics.</textarea>
              </div>
              <div class="col-12 d-flex gap-2">
                <button class="btn btn-primary"><i class="bi bi-save me-1"></i>Save</button>
                <button class="btn btn-outline-secondary">Reset</button>
              </div>
            </div>
          </div>

          {{-- Security --}}
          <div class="tab-pane fade" id="profile-security">
            <h2 class="h5 fw-bold mb-3">Change Password</h2>
            <div class="row g-3 mb-4">
              <div class="col-12">
                <label class="form-label">Current Password</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-lock"></i></span>
                  <input class="form-control" id="cur-pass" type="password" placeholder="Enter current password">
                  <button class="btn btn-outline-primary" type="button" data-password-toggle="#cur-pass"><i class="bi bi-eye"></i></button>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">New Password</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-lock"></i></span>
                  <input class="form-control" id="new-pass" type="password" placeholder="New password">
                  <button class="btn btn-outline-primary" type="button" data-password-toggle="#new-pass"><i class="bi bi-eye"></i></button>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Confirm Password</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-lock"></i></span>
                  <input class="form-control" id="conf-pass" type="password" placeholder="Confirm new password">
                  <button class="btn btn-outline-primary" type="button" data-password-toggle="#conf-pass"><i class="bi bi-eye"></i></button>
                </div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary"><i class="bi bi-shield-lock me-1"></i>Update Password</button>
              </div>
            </div>

            <div class="border-top pt-4">
              <h2 class="h5 fw-bold mb-3">Two-Factor Authentication</h2>
              <div class="d-grid gap-3">
                @foreach ([
                  ['Authenticator App', 'TOTP via Google Authenticator or Authy', true],
                  ['SMS Backup', 'Receive a code via SMS as a backup method', false],
                ] as [$label, $desc, $active])
                  <div class="d-flex justify-content-between align-items-center border-bottom pb-3">
                    <div>
                      <strong>{{ $label }}</strong>
                      @if ($active) <x-badge tone="success" class="ms-2">Active</x-badge> @endif
                      <div class="small text-secondary">{{ $desc }}</div>
                    </div>
                    <div class="form-check form-switch mb-0"><input class="form-check-input" type="checkbox" @checked($active)></div>
                  </div>
                @endforeach
              </div>
            </div>

            <div class="border-top pt-4 mt-2">
              <h2 class="h5 fw-bold mb-3">Active Sessions</h2>
              @foreach ([
                ['Chrome · macOS', 'New York, US', 'Now', true],
                ['Firefox · Windows', 'Singapore, SG', '2 hours ago', false],
                ['Mobile · iOS', 'London, UK', 'Yesterday', false],
              ] as [$agent, $location, $time, $current])
                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                  <div class="d-flex align-items-center gap-3">
                    <span class="icon-box"><i class="bi bi-laptop"></i></span>
                    <div>
                      <div class="fw-bold small">{{ $agent }}</div>
                      <div class="text-secondary small">{{ $location }} &middot; {{ $time }}</div>
                    </div>
                  </div>
                  @if ($current)
                    <x-badge tone="success">Current</x-badge>
                  @else
                    <button class="btn btn-sm btn-outline-danger">Revoke</button>
                  @endif
                </div>
              @endforeach
            </div>
          </div>

          {{-- Preferences --}}
          <div class="tab-pane fade" id="profile-preferences">
            <h2 class="h5 fw-bold mb-3">Display &amp; Locale</h2>
            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label">Language</label>
                <select class="form-select" data-control="select2">
                  <option selected>English (US)</option>
                  <option>English (UK)</option>
                  <option>Bahasa Indonesia</option>
                  <option>Japanese</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Date Format</label>
                <select class="form-select" data-control="select2">
                  <option selected>MM/DD/YYYY</option>
                  <option>DD/MM/YYYY</option>
                  <option>YYYY-MM-DD</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Number Format</label>
                <select class="form-select" data-control="select2">
                  <option selected>1,234.56</option>
                  <option>1.234,56</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Currency</label>
                <select class="form-select" data-control="select2">
                  <option selected>USD — US Dollar</option>
                  <option>EUR — Euro</option>
                  <option>IDR — Indonesian Rupiah</option>
                  <option>SGD — Singapore Dollar</option>
                </select>
              </div>
            </div>

            <div class="border-top pt-4">
              <h2 class="h5 fw-bold mb-3">Interface</h2>
              <div class="d-grid gap-3">
                @foreach ([
                  ['Compact Tables', 'Reduce row padding for denser data views', false],
                  ['Sticky Topbar', 'Keep the top navigation visible while scrolling', true],
                  ['Animations', 'Enable smooth transitions and micro-interactions', true],
                ] as [$label, $desc, $checked])
                  <div class="d-flex justify-content-between align-items-center border-bottom pb-3">
                    <div><strong>{{ $label }}</strong><div class="small text-secondary">{{ $desc }}</div></div>
                    <div class="form-check form-switch mb-0"><input class="form-check-input" type="checkbox" @checked($checked)></div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          {{-- Activity --}}
          <div class="tab-pane fade" id="profile-activity">
            <h2 class="h5 fw-bold mb-3">Recent Activity</h2>
            <div class="timeline">
              @foreach ($activities as $activity)
                <div class="timeline-item">
                  <span class="timeline-icon"><i class="bi {{ $activity['icon'] }}"></i></span>
                  <div>
                    <strong>{{ $activity['title'] }}</strong>
                    <div class="small text-secondary">{{ $activity['description'] }}</div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Sidebar --}}
    <div class="col-xl-4">
      {{-- Profile info card --}}
      <div class="surface mb-3">
        <div class="p-3 p-md-4 border-bottom">
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="avatar" style="width:48px;height:48px;font-size:1rem;flex-shrink:0">AD</div>
            <div class="flex-fill min-w-0">
              <div class="fw-bold">Admin Demo</div>
              <div class="text-secondary small">Super Admin</div>
            </div>
            <x-badge tone="success">Active</x-badge>
          </div>
          <div class="d-grid gap-2 small">
            <div class="d-flex align-items-center gap-2 text-secondary">
              <i class="bi bi-envelope" style="width:14px"></i>
              <span class="text-body">admin@example.com</span>
            </div>
            <div class="d-flex align-items-center gap-2 text-secondary">
              <i class="bi bi-telephone" style="width:14px"></i>
              <span class="text-body">+1 800 555 0199</span>
            </div>
            <div class="d-flex align-items-center gap-2 text-secondary">
              <i class="bi bi-building" style="width:14px"></i>
              <span class="text-body">Operations</span>
            </div>
            <div class="d-flex align-items-center gap-2 text-secondary">
              <i class="bi bi-calendar" style="width:14px"></i>
              <span class="text-body">Joined March 2022</span>
            </div>
          </div>
        </div>

        <div class="p-3 p-md-4 border-bottom">
          <div class="small fw-bold text-secondary text-uppercase mb-3" style="letter-spacing:.05em">Activity</div>
          @foreach ([['Login streak', '14 days', 82], ['Tasks closed', '47 this month', 70], ['Uptime', '99.8%', 99]] as [$label, $value, $pct])
            <div class="mb-3">
              <div class="d-flex justify-content-between small mb-1">
                <span>{{ $label }}</span><strong>{{ $value }}</strong>
              </div>
              <div class="progress" style="height:5px">
                <div class="progress-bar" style="width:{{ $pct }}%" role="progressbar"></div>
              </div>
            </div>
          @endforeach
        </div>

        <div class="p-3 p-md-4">
          <div class="small fw-bold text-secondary text-uppercase mb-3" style="letter-spacing:.05em">Permissions</div>
          <div class="d-flex flex-wrap gap-2">
            @foreach (['orders.view', 'orders.edit', 'products.manage', 'users.invite', 'reports.export', 'settings.write', 'audit.view', 'roles.manage'] as $perm)
              <span class="badge bg-primary bg-opacity-10 text-primary fw-normal">{{ $perm }}</span>
            @endforeach
          </div>
        </div>
      </div>

      {{-- Danger zone --}}
      <div class="surface p-3 p-md-4">
        <div class="small fw-bold text-danger text-uppercase mb-2" style="letter-spacing:.05em">Danger Zone</div>
        <p class="small text-secondary mb-3">Deactivating your account will revoke all sessions and remove access immediately.</p>
        <button class="btn btn-outline-danger w-100"><i class="bi bi-person-x me-1"></i>Deactivate Account</button>
      </div>
    </div>
  </div>
@endsection
