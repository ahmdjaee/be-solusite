@extends('layouts.app')

@section('title', 'Blank Page')

@php $title = 'Blank Page'; @endphp

@section('content')
  <div class="d-flex align-items-center justify-content-center" style="min-height: 480px;">
    <div class="text-center" style="max-width: 400px; width: 100%;">
      <div style="
        border: 2px dashed var(--app-border);
        border-radius: 20px;
        padding: 3rem 2.5rem;
        background: var(--app-surface);
        box-shadow: var(--app-shadow-soft);
      ">
        <div style="
          width: 72px;
          height: 72px;
          border-radius: 18px;
          background: var(--app-blue-soft);
          display: flex;
          align-items: center;
          justify-content: center;
          margin: 0 auto 1.5rem;
        ">
          <i class="bi bi-file-earmark-plus" style="font-size: 2rem; color: var(--app-blue);"></i>
        </div>
        <h5 style="font-weight: 700; color: var(--app-text); margin-bottom: 0.5rem; letter-spacing: -0.02em;">
          Start Building Here
        </h5>
        <p style="font-size: 0.9375rem; color: var(--app-muted); margin-bottom: 0; line-height: 1.6;">
          This is a blank page template — add your content here.
        </p>
      </div>
    </div>
  </div>
@endsection
