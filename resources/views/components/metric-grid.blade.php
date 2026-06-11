@props(['metrics', 'columns' => 'col-md-6 col-xl-3'])

<div class="row g-3 mb-3">
  @foreach ($metrics as $metric)
    <div class="{{ $columns }}">
      <x-metric-card
        :label="$metric['label']"
        :value="$metric['value']"
        :description="$metric['description'] ?? null"
        :icon="$metric['icon'] ?? null"
        :tone="$metric['tone'] ?? null"
        :trend="$metric['trend'] ?? null"
        :trend-icon="$metric['trend_icon'] ?? null"
        :trend-tone="$metric['trend_tone'] ?? 'up'"
      />
    </div>
  @endforeach
</div>
