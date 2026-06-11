@props(['tone' => 'info'])

@php($class = $tone === 'info' ? 'badge-soft' : "badge-soft-{$tone}")

<span {{ $attributes->class(['badge', $class]) }}>{{ $slot }}</span>
