@extends('layouts.app')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="#">Workspace</a></li>
@endsection

@section('content')
  <div class="row g-3">
    <div class="col-12 col-lg-8 col-xl-9">
      <div class="surface p-3" data-calendar-shell>
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
          <h2 class="h5 mb-0" data-calendar-title>{{ $monthLabel }}</h2>
          <div class="page-actions calendar-toolbar">
            <button class="btn btn-outline-primary toolbar-icon" data-calendar-prev type="button" aria-label="Previous period"><i class="bi bi-chevron-left"></i></button>
            <button class="btn btn-outline-primary toolbar-icon" data-calendar-next type="button" aria-label="Next period"><i class="bi bi-chevron-right"></i></button>
            <button class="btn btn-outline-primary btn-sm" data-calendar-today type="button">Today</button>
            <div class="btn-group btn-group-sm">
              <button class="btn btn-primary active" data-calendar-view="dayGridMonth" type="button">Month</button>
              <button class="btn btn-outline-primary" data-calendar-view="timeGridWeek" type="button">Week</button>
              <button class="btn btn-outline-primary" data-calendar-view="timeGridDay" type="button">Day</button>
              <button class="btn btn-outline-primary" data-calendar-view="listWeek" type="button">List</button>
            </div>
            <button class="btn btn-primary calendar-create-action" data-bs-toggle="modal" data-bs-target="#addEventModal" type="button"><i class="bi bi-plus-lg me-1"></i><span>Add Event</span></button>
          </div>
        </div>

        <div
          class="calendar-grid calendar-library"
          data-calendar
          data-calendar-initial-date="{{ $initialDate }}"
          data-calendar-events='@json($calendarEvents)'
        ></div>
      </div>
    </div>

    <div class="col-12 col-lg-4 col-xl-3">
      <div class="surface p-3 calendar-sidebar">
        <h2 class="h6 mb-3">Upcoming Events</h2>
        <div class="d-flex flex-column gap-2">
          @foreach ($events as $ev)
            <div class="calendar-ev-item">
              <div class="calendar-ev-date">
                <span class="calendar-ev-month">{{ $monthShort }}</span>
                <span class="calendar-ev-day">{{ $ev['day'] }}</span>
              </div>
              <div class="min-w-0 flex-fill">
                <div class="small text-truncate">{{ $ev['title'] }}</div>
                <span class="calendar-event {{ $ev['class'] }} mt-1 d-inline-block">{{ $ev['label'] }}</span>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection

@push('modals')
  <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addEventLabel">Add Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Event Title</label>
            <input class="form-control" type="text" placeholder="e.g. Board Meeting">
          </div>
          <div class="row g-3">
            <div class="col-6">
              <label class="form-label">Date</label>
              <input class="form-control" type="date" value="2026-05-15">
            </div>
            <div class="col-6">
              <label class="form-label">Time</label>
              <input class="form-control" type="time" value="09:00">
            </div>
            <div class="col-12">
              <label class="form-label">Category</label>
              <select class="form-select" data-control="select2">
                @foreach (['General', 'Finance', 'Operations', 'Security', 'HR'] as $cat)
                  <option>{{ $cat }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Notes</label>
              <textarea class="form-control" rows="2" placeholder="Optional notes"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-plus-lg me-1"></i>Save Event</button>
        </div>
      </div>
    </div>
  </div>
@endpush
