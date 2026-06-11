@props(['tone' => 'success'])

@php($class = match ($tone) {
    'warning' => 'warning',
    'danger' => 'danger',
    default => '',
})

<span class="status-dot {{ $class }}">{{ $slot }}</span>
