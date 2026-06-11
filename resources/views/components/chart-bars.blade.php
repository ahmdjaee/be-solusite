@props(['chart'])

<div class="surface p-3 chart-card h-100 d-flex flex-column">
  <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
    <div>
      <h2 class="h5 fw-bold mb-1">{{ $chart['title'] }}</h2>
      <div class="text-secondary small">{{ $chart['subtitle'] }}</div>
    </div>
    {{ $actions ?? '' }}
  </div>
  <div style="position:relative;min-height:200px;flex:1">
    <canvas data-chart="{{ json_encode([
      'type'     => $chart['type']     ?? 'bar',
      'labels'   => $chart['labels']   ?? [],
      'datasets' => $chart['datasets'] ?? [],
      'legend'   => $chart['legend']   ?? false,
    ]) }}"></canvas>
  </div>
</div>
