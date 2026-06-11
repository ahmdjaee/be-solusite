@props([
    'label',
    'value',
    'description' => null,
    'icon' => null,
    'tone' => null,
    'trend' => null,
    'trendIcon' => null,
    'trendTone' => 'up',
])

<div class="metric-card {{ $tone }}">
  @if ($icon || $trend)
    <div class="d-flex justify-content-between align-items-start mb-4">
      @if ($icon)
        <span class="icon-box {{ $tone }}"><i class="bi {{ $icon }}"></i></span>
      @endif
      @if ($trend)
        <span class="metric-trend trend-{{ $trendTone }}">
          @if ($trendIcon)<i class="bi {{ $trendIcon }}"></i>@endif{{ $trend }}
        </span>
      @endif
    </div>
  @endif
  <div class="metric-label">{{ $label }}</div>
  <div class="metric-value mt-3">{{ $value }}</div>
  @if ($description)
    <div class="small text-secondary mt-2">{{ $description }}</div>
  @endif
</div>
