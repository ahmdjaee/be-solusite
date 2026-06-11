@extends('layouts.app')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="#">Workspace</a></li>
@endsection

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <div class="d-flex gap-2 flex-wrap">
      @foreach ([['All', 'primary'], ['Feature', 'outline-primary'], ['Bug Fix', 'outline-primary'], ['Security', 'outline-primary']] as [$label, $variant])
        <button class="btn btn-sm btn-{{ $variant }}">{{ $label }}</button>
      @endforeach
    </div>
    <div class="page-actions">
      <div class="d-flex">
        @foreach (['DW', 'SR', 'RM', 'BP'] as $av)
          <span class="avatar avatar-sm" style="margin-left:{{ $loop->first ? 0 : -8 }}px; border:2px solid var(--app-surface); z-index:{{ 10 - $loop->index }}">{{ $av }}</span>
        @endforeach
      </div>
      <span class="text-secondary small">4 members</span>
      <button class="btn btn-outline-primary"><i class="bi bi-funnel me-1"></i><span>Filter</span></button>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCardModal"><i class="bi bi-plus-lg me-1"></i><span>Add Task</span></button>
    </div>
  </div>

  <div class="kanban-board" data-kanban-board>
    @foreach ($columns as $col)
      <div class="kanban-col" data-col-id="{{ $col['id'] }}">
        <div class="kanban-col-header">
          <span class="kanban-col-dot" style="background:{{ $col['color'] }}; border-radius:50%; width:8px; height:8px; flex-shrink:0; display:inline-block;"></span>
          <span class="kanban-col-title">{{ $col['title'] }}</span>
          <span class="kanban-count">{{ count($col['cards']) }}</span>
        </div>
        <div class="kanban-cards" data-kanban-list>
          @foreach ($col['cards'] as $card)
            <div class="kanban-card">
              <span class="kanban-card-tag {{ $card['tag_class'] }} mb-2 d-inline-block">{{ $card['tag'] }}</span>
              <div class="kanban-card-title">{{ $card['title'] }}</div>
              <div class="kanban-card-meta">
                <span class="avatar avatar-sm" style="font-size:.65rem; min-height:22px; min-width:22px;">{{ $card['assignee'] }}</span>
                <span><i class="bi bi-calendar3 me-1"></i>{{ $card['due'] }}</span>
              </div>
            </div>
          @endforeach
        </div>
        <button class="kanban-add-btn" data-bs-toggle="modal" data-bs-target="#addCardModal">
          <i class="bi bi-plus me-1"></i>Add card
        </button>
      </div>
    @endforeach
  </div>
@endsection

@push('modals')
  <div class="modal fade" id="addCardModal" tabindex="-1" aria-labelledby="addCardModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCardModalLabel">Add New Task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input class="form-control" type="text" placeholder="Describe the task">
          </div>
          <div class="row g-3">
            <div class="col-6">
              <label class="form-label">Column</label>
              <select class="form-select">
                @foreach ($columns as $col)
                  <option>{{ $col['title'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-6">
              <label class="form-label">Tag</label>
              <select class="form-select">
                @foreach (['Feature', 'Bug Fix', 'Improvement', 'Security', 'Integration', 'UI'] as $tag)
                  <option>{{ $tag }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-6">
              <label class="form-label">Assignee</label>
              <select class="form-select">
                @foreach (['DM — Diana', 'SN — Sarah', 'RK — Rex', 'BP — Ben', 'AR — Andy'] as $person)
                  <option>{{ $person }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-6">
              <label class="form-label">Due Date</label>
              <input class="form-control" type="date" value="2026-05-15">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-plus-lg me-1"></i>Add Task</button>
        </div>
      </div>
    </div>
  </div>
@endpush
