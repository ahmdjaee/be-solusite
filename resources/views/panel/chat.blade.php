@extends('layouts.app')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="#">Workspace</a></li>
@endsection

@section('content')
  <div class="d-flex gap-3" style="height: calc(100vh - 140px); min-height: 480px;">

    {{-- ─── Left column: contact list ──────────────────────────── --}}
    <div class="surface d-flex flex-column" style="width: 300px; flex-shrink: 0; overflow: hidden;">

      {{-- Search --}}
      <div class="p-3 border-bottom" style="border-color: var(--app-border) !important;">
        <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
          <h2 class="h6 fw-bold mb-0">Messages</h2>
          <button class="btn btn-primary btn-sm" type="button"><i class="bi bi-pencil-square me-1"></i><span>New Message</span></button>
        </div>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-search"></i></span>
          <input class="form-control" type="search" placeholder="Search conversations…">
        </div>
      </div>

      {{-- Contact list --}}
      <div class="flex-1 overflow-y-auto" style="overflow-y: auto;">

        {{-- Contact 1 — active --}}
        <div class="d-flex align-items-center gap-3 px-3 py-3" style="cursor: pointer; background: var(--app-blue-soft); border-left: 3px solid var(--app-blue);">
          <span class="avatar flex-shrink-0">RH</span>
          <div class="flex-1 min-width-0" style="min-width: 0;">
            <div class="d-flex justify-content-between align-items-baseline">
              <span class="fw-bold" style="font-size: .875rem;">Rini Hartati</span>
              <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0; margin-left: .5rem;">09:42</span>
            </div>
            <div class="text-secondary text-truncate" style="font-size: .8rem;">My order still hasn't arrived yet…</div>
          </div>
          <span class="badge rounded-pill bg-primary" style="font-size: .7rem; flex-shrink: 0;">3</span>
        </div>

        {{-- Contact 2 --}}
        <div class="d-flex align-items-center gap-3 px-3 py-3 border-bottom" style="cursor: pointer; border-color: var(--app-border) !important;">
          <span class="avatar flex-shrink-0" style="background: color-mix(in srgb, var(--app-green) 12%, var(--app-surface)); color: var(--app-green); border-color: color-mix(in srgb, var(--app-green) 20%, transparent);">BS</span>
          <div class="flex-1 min-width-0" style="min-width: 0;">
            <div class="d-flex justify-content-between align-items-baseline">
              <span class="fw-semibold" style="font-size: .875rem;">Brad Santos</span>
              <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0; margin-left: .5rem;">08:15</span>
            </div>
            <div class="text-secondary text-truncate" style="font-size: .8rem;">Thanks for the quick response!</div>
          </div>
          <span class="badge rounded-pill bg-primary" style="font-size: .7rem; flex-shrink: 0;">1</span>
        </div>

        {{-- Contact 3 --}}
        <div class="d-flex align-items-center gap-3 px-3 py-3 border-bottom" style="cursor: pointer; border-color: var(--app-border) !important;">
          <span class="avatar flex-shrink-0" style="background: color-mix(in srgb, var(--app-amber) 12%, var(--app-surface)); color: var(--app-amber); border-color: color-mix(in srgb, var(--app-amber) 20%, transparent);">SC</span>
          <div class="flex-1 min-width-0" style="min-width: 0;">
            <div class="d-flex justify-content-between align-items-baseline">
              <span style="font-size: .875rem;">Sarah Connor</span>
              <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0; margin-left: .5rem;">Yesterday</span>
            </div>
            <div class="text-secondary text-truncate" style="font-size: .8rem;">Can I change the delivery address?</div>
          </div>
        </div>

        {{-- Contact 4 --}}
        <div class="d-flex align-items-center gap-3 px-3 py-3 border-bottom" style="cursor: pointer; border-color: var(--app-border) !important;">
          <span class="avatar flex-shrink-0" style="background: color-mix(in srgb, var(--app-red) 12%, var(--app-surface)); color: var(--app-red); border-color: color-mix(in srgb, var(--app-red) 20%, transparent);">AF</span>
          <div class="flex-1 min-width-0" style="min-width: 0;">
            <div class="d-flex justify-content-between align-items-baseline">
              <span class="fw-semibold" style="font-size: .875rem;">Ahmad Fauzi</span>
              <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0; margin-left: .5rem;">Yesterday</span>
            </div>
            <div class="text-secondary text-truncate" style="font-size: .8rem;">I want to request a refund for order #ORD-2198</div>
          </div>
          <span class="badge rounded-pill bg-primary" style="font-size: .7rem; flex-shrink: 0;">2</span>
        </div>

        {{-- Contact 5 --}}
        <div class="d-flex align-items-center gap-3 px-3 py-3 border-bottom" style="cursor: pointer; border-color: var(--app-border) !important;">
          <span class="avatar flex-shrink-0">LP</span>
          <div class="flex-1 min-width-0" style="min-width: 0;">
            <div class="d-flex justify-content-between align-items-baseline">
              <span style="font-size: .875rem;">Lisa Parker</span>
              <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0; margin-left: .5rem;">Mon</span>
            </div>
            <div class="text-secondary text-truncate" style="font-size: .8rem;">Got it, I'll wait for the tracking update.</div>
          </div>
        </div>

        {{-- Contact 6 --}}
        <div class="d-flex align-items-center gap-3 px-3 py-3 border-bottom" style="cursor: pointer; border-color: var(--app-border) !important;">
          <span class="avatar flex-shrink-0" style="background: color-mix(in srgb, var(--app-sky) 14%, var(--app-surface)); color: var(--app-sky); border-color: color-mix(in srgb, var(--app-sky) 22%, transparent);">DK</span>
          <div class="flex-1 min-width-0" style="min-width: 0;">
            <div class="d-flex justify-content-between align-items-baseline">
              <span style="font-size: .875rem;">Derek Kirwan</span>
              <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0; margin-left: .5rem;">Sun</span>
            </div>
            <div class="text-secondary text-truncate" style="font-size: .8rem;">Is the warranty still valid for this product?</div>
          </div>
        </div>

        {{-- Contact 7 --}}
        <div class="d-flex align-items-center gap-3 px-3 py-3 border-bottom" style="cursor: pointer; border-color: var(--app-border) !important;">
          <span class="avatar flex-shrink-0" style="background: color-mix(in srgb, var(--app-green) 12%, var(--app-surface)); color: var(--app-green); border-color: color-mix(in srgb, var(--app-green) 20%, transparent);">MS</span>
          <div class="flex-1 min-width-0" style="min-width: 0;">
            <div class="d-flex justify-content-between align-items-baseline">
              <span style="font-size: .875rem;">Maya Sari</span>
              <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0; margin-left: .5rem;">Sat</span>
            </div>
            <div class="text-secondary text-truncate" style="font-size: .8rem;">The package was damaged on arrival.</div>
          </div>
        </div>

        {{-- Contact 8 --}}
        <div class="d-flex align-items-center gap-3 px-3 py-3" style="cursor: pointer;">
          <span class="avatar flex-shrink-0" style="background: color-mix(in srgb, var(--app-amber) 12%, var(--app-surface)); color: var(--app-amber); border-color: color-mix(in srgb, var(--app-amber) 20%, transparent);">EP</span>
          <div class="flex-1 min-width-0" style="min-width: 0;">
            <div class="d-flex justify-content-between align-items-baseline">
              <span style="font-size: .875rem;">Eko Prasetyo</span>
              <span class="text-secondary" style="font-size: .72rem; flex-shrink: 0; margin-left: .5rem;">Fri</span>
            </div>
            <div class="text-secondary text-truncate" style="font-size: .8rem;">Do you have this in size L?</div>
          </div>
        </div>

      </div>
    </div>

    {{-- ─── Right column: chat window ───────────────────────────── --}}
    <div class="surface flex-1 d-flex flex-column" style="overflow: hidden; min-width: 0;">

      {{-- Chat header --}}
      <div class="d-flex align-items-center gap-3 px-4 py-3 border-bottom flex-shrink-0" style="border-color: var(--app-border) !important;">
        <span class="avatar">RH</span>
        <div class="flex-1">
          <div class="fw-bold" style="font-size: .95rem;">Rini Hartati</div>
          <div class="d-flex align-items-center gap-1" style="font-size: .8rem; color: var(--app-green);">
            <span style="display: inline-block; width: .5rem; height: .5rem; border-radius: 50%; background: var(--app-green);"></span>
            Online
          </div>
        </div>
        <div class="d-flex gap-2">
          <button class="btn btn-outline-primary toolbar-icon" type="button" title="Call"><i class="bi bi-telephone"></i></button>
          <button class="btn btn-outline-primary toolbar-icon" type="button" title="More options"><i class="bi bi-three-dots-vertical"></i></button>
        </div>
      </div>

      {{-- Messages area --}}
      <div class="flex-1 p-4 d-flex flex-column gap-3" style="overflow-y: auto;">

        {{-- Received --}}
        <div class="d-flex gap-2 align-items-end" style="max-width: 68%;">
          <span class="avatar avatar-sm flex-shrink-0">RH</span>
          <div>
            <div class="px-3 py-2 rounded-3" style="background: var(--app-surface-2); border: 1px solid var(--app-border); font-size: .875rem;">
              Hi, I placed an order three days ago (#ORD-11842) and the tracking hasn't been updated since. Can you check what's going on?
            </div>
            <div class="text-secondary mt-1" style="font-size: .72rem;">09:14</div>
          </div>
        </div>

        {{-- Sent --}}
        <div class="d-flex flex-row-reverse gap-2 align-items-end ms-auto" style="max-width: 68%;">
          <span class="avatar avatar-sm flex-shrink-0">AD</span>
          <div>
            <div class="px-3 py-2 rounded-3 text-white" style="background: var(--app-blue); font-size: .875rem;">
              Hello Rini! I'm looking into order #ORD-11842 right now. Could you confirm your registered phone number so I can verify the account?
            </div>
            <div class="text-secondary mt-1 text-end" style="font-size: .72rem;">09:17</div>
          </div>
        </div>

        {{-- Received --}}
        <div class="d-flex gap-2 align-items-end" style="max-width: 68%;">
          <span class="avatar avatar-sm flex-shrink-0">RH</span>
          <div>
            <div class="px-3 py-2 rounded-3" style="background: var(--app-surface-2); border: 1px solid var(--app-border); font-size: .875rem;">
              Sure, it's 0812-3456-7890.
            </div>
            <div class="text-secondary mt-1" style="font-size: .72rem;">09:18</div>
          </div>
        </div>

        {{-- Sent --}}
        <div class="d-flex flex-row-reverse gap-2 align-items-end ms-auto" style="max-width: 68%;">
          <span class="avatar avatar-sm flex-shrink-0">AD</span>
          <div>
            <div class="px-3 py-2 rounded-3 text-white" style="background: var(--app-blue); font-size: .875rem;">
              Thank you! I can see your order was picked up by FedEx yesterday at 14:30. It's currently in transit at the Houston sorting hub. Expected delivery is tomorrow before 5 PM.
            </div>
            <div class="text-secondary mt-1 text-end" style="font-size: .72rem;">09:20</div>
          </div>
        </div>

        {{-- Received --}}
        <div class="d-flex gap-2 align-items-end" style="max-width: 68%;">
          <span class="avatar avatar-sm flex-shrink-0">RH</span>
          <div>
            <div class="px-3 py-2 rounded-3" style="background: var(--app-surface-2); border: 1px solid var(--app-border); font-size: .875rem;">
              Oh okay, that's a relief! But why wasn't the tracking app updated then?
            </div>
            <div class="text-secondary mt-1" style="font-size: .72rem;">09:21</div>
          </div>
        </div>

        {{-- Sent --}}
        <div class="d-flex flex-row-reverse gap-2 align-items-end ms-auto" style="max-width: 68%;">
          <span class="avatar avatar-sm flex-shrink-0">AD</span>
          <div>
            <div class="px-3 py-2 rounded-3 text-white" style="background: var(--app-blue); font-size: .875rem;">
              There was a sync delay on FedEx's end — their API experienced an outage between 10 PM and 2 AM last night. Updates should now reflect properly. I've also flagged your order for priority monitoring.
            </div>
            <div class="text-secondary mt-1 text-end" style="font-size: .72rem;">09:23</div>
          </div>
        </div>

        {{-- Received --}}
        <div class="d-flex gap-2 align-items-end" style="max-width: 68%;">
          <span class="avatar avatar-sm flex-shrink-0">RH</span>
          <div>
            <div class="px-3 py-2 rounded-3" style="background: var(--app-surface-2); border: 1px solid var(--app-border); font-size: .875rem;">
              Thank you so much! That's very helpful. I really appreciate the fast response.
            </div>
            <div class="text-secondary mt-1" style="font-size: .72rem;">09:38</div>
          </div>
        </div>

        {{-- Sent --}}
        <div class="d-flex flex-row-reverse gap-2 align-items-end ms-auto" style="max-width: 68%;">
          <span class="avatar avatar-sm flex-shrink-0">AD</span>
          <div>
            <div class="px-3 py-2 rounded-3 text-white" style="background: var(--app-blue); font-size: .875rem;">
              Happy to help, Rini! You'll receive a notification once the order is out for delivery. Is there anything else I can assist you with today?
            </div>
            <div class="text-secondary mt-1 text-end" style="font-size: .72rem;">09:40</div>
          </div>
        </div>

        {{-- Received --}}
        <div class="d-flex gap-2 align-items-end" style="max-width: 68%;">
          <span class="avatar avatar-sm flex-shrink-0">RH</span>
          <div>
            <div class="px-3 py-2 rounded-3" style="background: var(--app-surface-2); border: 1px solid var(--app-border); font-size: .875rem;">
              My order still hasn't arrived yet, and it's past the expected delivery date now. What should I do?
            </div>
            <div class="text-secondary mt-1" style="font-size: .72rem;">09:42</div>
          </div>
        </div>

      </div>

      {{-- Input area --}}
      <div class="px-4 py-3 border-top flex-shrink-0" style="border-color: var(--app-border) !important;">
        <div class="d-flex gap-2 align-items-center">
          <button class="btn btn-outline-primary toolbar-icon" type="button" title="Attach file"><i class="bi bi-paperclip"></i></button>
          <input class="form-control" type="text" placeholder="Type a message…" style="flex: 1;">
          <button class="btn btn-primary toolbar-icon" type="button" title="Send message"><i class="bi bi-send"></i></button>
        </div>
      </div>

    </div>
  </div>
@endsection
