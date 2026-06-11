@props(['title', 'subtitle' => null])

<div class="table-card">
  <div class="table-card-header">
    <div>
      <h2 class="h5 fw-bold table-card-title">{{ $title }}</h2>
      @if ($subtitle)
        <div class="table-card-subtitle">{{ $subtitle }}</div>
      @endif
    </div>
    @isset($actions)
      <div class="page-actions">{{ $actions }}</div>
    @endisset
  </div>
  {{ $slot }}
</div>
