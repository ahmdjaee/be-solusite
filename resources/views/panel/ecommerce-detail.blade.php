@extends('layouts.app')

@section('breadcrumb')
  <li class="breadcrumb-item">Template</li>
  <li class="breadcrumb-item"><a href="{{ route('ecommerce') }}">Shop</a></li>
  <li class="breadcrumb-item">{{ $product['category'] }}</li>
@endsection

@php
  $full = (int) floor($product['rating']);
  $half = $product['rating'] - $full >= 0.5;
  $disc = $product['old_price'] ? (int) round((1 - $product['price'] / $product['old_price']) * 100) : 0;
  $totalReviews = array_sum($product['rating_breakdown']);
@endphp

@section('content')
  {{-- Main product section --}}
  <div class="row g-4 mb-4">

    {{-- Image gallery --}}
    <div class="col-lg-5">
      <div class="surface p-3 mb-2 d-flex align-items-center justify-content-center position-relative"
           style="aspect-ratio:1;background:{{ $product['bg'] }};border-radius:var(--app-radius)">
        <i class="bi {{ $product['icon'] }}" style="font-size:8rem;color:{{ $product['color'] }};opacity:.75"></i>
        @if ($product['badge'])
          <span class="badge bg-{{ $product['badge_tone'] }} position-absolute top-0 start-0 m-3">{{ $product['badge'] }}</span>
        @endif
        @if ($disc > 0)
          <span class="badge bg-danger position-absolute top-0 end-0 m-3">-{{ $disc }}%</span>
        @endif
      </div>
      {{-- Thumbnail strip --}}
      <div class="d-flex gap-2">
        @foreach ([0.75, 0.55, 0.65, 0.45] as $i => $op)
          <div class="surface flex-fill d-flex align-items-center justify-content-center rounded cursor-pointer {{ $i === 0 ? 'border border-primary' : '' }}"
               style="aspect-ratio:1;background:{{ $product['bg'] }};border-radius:var(--app-radius)">
            <i class="bi {{ $product['icon'] }}" style="font-size:1.8rem;color:{{ $product['color'] }};opacity:{{ $op }}"></i>
          </div>
        @endforeach
      </div>
    </div>

    {{-- Product info --}}
    <div class="col-lg-7">
      <div class="surface p-3 p-md-4 h-100 d-flex flex-column">

        {{-- Category & SKU --}}
        <div class="d-flex align-items-center gap-2 mb-2">
          <span class="badge bg-primary bg-opacity-10 text-primary">{{ $product['category'] }}</span>
          <span class="text-secondary small">{{ $product['sku'] }}</span>
          @if ($product['badge'])
            <span class="badge bg-{{ $product['badge_tone'] }}">{{ $product['badge'] }}</span>
          @endif
        </div>

        {{-- Name --}}
        <h1 class="h3 fw-bold mb-2">{{ $product['name'] }}</h1>

        {{-- Rating row --}}
        <div class="d-flex align-items-center gap-2 mb-3">
          <div class="d-flex gap-1">
            @for ($s = 1; $s <= 5; $s++)
              <i class="bi {{ $s <= $full ? 'bi-star-fill' : ($half && $s === $full + 1 ? 'bi-star-half' : 'bi-star') }} star-rating" style="font-size:.9rem"></i>
            @endfor
          </div>
          <span class="fw-bold small">{{ number_format($product['rating'], 1) }}</span>
          <a href="#reviews" class="small text-secondary text-decoration-none">{{ number_format($product['review_count']) }} reviews</a>
          <span class="text-secondary small">&middot;</span>
          <span class="small text-success"><i class="bi bi-check-circle-fill me-1"></i>{{ number_format($product['stock_qty']) }} in stock</span>
        </div>

        {{-- Price --}}
        <div class="d-flex align-items-end gap-3 mb-4 pb-4 border-bottom">
          <span class="fw-bold" style="font-size:2rem;line-height:1">${{ number_format($product['price'], 2) }}</span>
          @if ($product['old_price'])
            <div>
              <div class="text-secondary text-decoration-line-through">${{ number_format($product['old_price'], 2) }}</div>
              <div class="small text-success fw-bold">You save ${{ number_format($product['old_price'] - $product['price'], 2) }} ({{ $disc }}%)</div>
            </div>
          @endif
        </div>

        {{-- Colour selector --}}
        <div class="mb-3">
          <div class="small fw-bold mb-2">Colour</div>
          <div class="d-flex gap-2">
            @foreach ($product['colors'] as $i => $hex)
              <button class="rounded-circle border-0 {{ $i === 0 ? 'outline-ring' : '' }}"
                      style="width:28px;height:28px;background:{{ $hex }};cursor:pointer"
                      title="{{ $hex }}"></button>
            @endforeach
          </div>
        </div>

        {{-- Size selector --}}
        <div class="mb-4">
          <div class="small fw-bold mb-2">Size</div>
          <div class="d-flex gap-2 flex-wrap">
            @foreach ($product['sizes'] as $i => $size)
              <button class="btn btn-sm {{ $i === 2 ? 'btn-primary' : 'btn-outline-secondary' }}" style="min-width:44px">{{ $size }}</button>
            @endforeach
          </div>
        </div>

        {{-- Quantity + actions --}}
        <div class="d-flex gap-3 align-items-center mb-4 flex-wrap">
          <div class="input-group" style="width:130px">
            <button class="btn btn-outline-secondary" type="button"><i class="bi bi-dash"></i></button>
            <input class="form-control text-center" type="number" value="1" min="1" max="{{ $product['stock_qty'] }}">
            <button class="btn btn-outline-secondary" type="button"><i class="bi bi-plus"></i></button>
          </div>
          <button class="btn btn-primary flex-fill" style="min-width:160px">
            <i class="bi bi-cart-plus me-2"></i>Add to Cart
          </button>
          <button class="btn btn-outline-primary" style="min-width:120px">
            <i class="bi bi-lightning-fill me-1"></i>Buy Now
          </button>
          <button class="btn btn-outline-secondary" title="Add to wishlist">
            <i class="bi bi-heart"></i>
          </button>
        </div>

        {{-- Shipping & returns --}}
        <div class="d-grid gap-2 mt-auto">
          <div class="d-flex align-items-center gap-2 small text-secondary">
            <i class="bi bi-truck text-success"></i>
            <span>{{ $product['shipping'] }}</span>
          </div>
          <div class="d-flex align-items-center gap-2 small text-secondary">
            <i class="bi bi-arrow-return-left text-primary"></i>
            <span>{{ $product['returns'] }}</span>
          </div>
          <div class="d-flex align-items-center gap-2 small text-secondary">
            <i class="bi bi-shield-check text-success"></i>
            <span>Secure checkout &middot; SSL encrypted</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Tabs: Description / Specs / Reviews --}}
  <div class="surface p-3 p-md-4 mb-4">
    <ul class="nav nav-pills mb-4" role="tablist">
      @foreach (['desc' => 'Description', 'specs' => 'Specifications', 'reviews' => 'Reviews (' . number_format($product['review_count']) . ')'] as $tid => $tlabel)
        <li class="nav-item">
          <button class="nav-link @if($loop->first) active @endif" data-bs-toggle="pill" data-bs-target="#pd-{{ $tid }}" type="button">{{ $tlabel }}</button>
        </li>
      @endforeach
    </ul>

    <div class="tab-content">
      {{-- Description --}}
      <div class="tab-pane fade show active" id="pd-desc">
        <div class="row g-4">
          <div class="col-md-7">
            <p class="text-secondary mb-4">{{ $product['description'] }}</p>
            <h3 class="h6 fw-bold mb-3">What's Great About It</h3>
            <ul class="d-grid gap-2 list-unstyled">
              @foreach ($product['highlights'] as $h)
                <li class="d-flex gap-2">
                  <i class="bi bi-check-circle-fill text-success mt-1 shrink-0"></i>
                  <span>{{ $h }}</span>
                </li>
              @endforeach
            </ul>
          </div>
          <div class="col-md-5">
            <div class="surface-plain rounded p-3">
              <div class="small fw-bold text-secondary text-uppercase mb-3" style="letter-spacing:.06em">Quick Facts</div>
              <div class="d-grid gap-2">
                @foreach (array_slice($product['specs'], 0, 4) as $spec)
                  <div class="d-flex justify-content-between small border-bottom pb-2">
                    <span class="text-secondary">{{ $spec['label'] }}</span>
                    <span class="fw-bold">{{ $spec['value'] }}</span>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Specifications --}}
      <div class="tab-pane fade" id="pd-specs">
        <div class="row g-3">
          @foreach ($product['specs'] as $spec)
            <div class="col-md-6">
              <div class="d-flex justify-content-between border-bottom pb-3">
                <span class="text-secondary">{{ $spec['label'] }}</span>
                <span class="fw-bold">{{ $spec['value'] }}</span>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      {{-- Reviews --}}
      <div class="tab-pane fade" id="pd-reviews" id="reviews">
        <div class="row g-4 mb-4">
          {{-- Rating summary --}}
          <div class="col-md-3 text-center">
            <div class="fw-bold mb-1" style="font-size:3.5rem;line-height:1">{{ number_format($product['rating'], 1) }}</div>
            <div class="d-flex justify-content-center gap-1 mb-1">
              @for ($s = 1; $s <= 5; $s++)
                <i class="bi {{ $s <= $full ? 'bi-star-fill' : ($half && $s === $full + 1 ? 'bi-star-half' : 'bi-star') }} star-rating"></i>
              @endfor
            </div>
            <div class="small text-secondary">{{ number_format($totalReviews) }} reviews</div>
          </div>
          {{-- Breakdown bars --}}
          <div class="col-md-5">
            @foreach ([5, 4, 3, 2, 1] as $star)
              @php $pct = $totalReviews > 0 ? round($product['rating_breakdown'][$star] / $totalReviews * 100) : 0; @endphp
              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="small shrink-0" style="width:1rem">{{ $star }}</span>
                <i class="bi bi-star-fill star-rating shrink-0" style="font-size:.7rem"></i>
                <div class="progress flex-fill" style="height:8px">
                  <div class="progress-bar" style="width:{{ $pct }}%" role="progressbar"></div>
                </div>
                <span class="small text-secondary shrink-0" style="width:2rem">{{ $pct }}%</span>
              </div>
            @endforeach
          </div>
          {{-- Write review CTA --}}
          <div class="col-md-4 d-flex flex-column align-items-start justify-content-center gap-2">
            <div class="fw-bold">Share your experience</div>
            <div class="small text-secondary">Verified buyers get priority approval.</div>
            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil me-1"></i>Write a Review</button>
          </div>
        </div>

        <div class="d-grid gap-3">
          @foreach ($product['reviews'] as $rev)
            @php $rf = (int) floor($rev['rating']); @endphp
            <div class="border-top pt-3">
              <div class="d-flex align-items-center gap-3 mb-2">
                <div class="avatar" style="width:36px;height:36px;font-size:.8rem;flex-shrink:0">
                  {{ strtoupper(substr($rev['author'], 0, 2)) }}
                </div>
                <div class="flex-fill">
                  <div class="d-flex align-items-center gap-2 flex-wrap">
                    <span class="fw-bold small">{{ $rev['author'] }}</span>
                    @if ($rev['verified'])
                      <span class="badge bg-success bg-opacity-10 text-success" style="font-size:.65rem">Verified Purchase</span>
                    @endif
                    <span class="text-secondary small ms-auto">{{ $rev['date'] }}</span>
                  </div>
                  <div class="d-flex gap-1 mt-1">
                    @for ($s = 1; $s <= 5; $s++)
                      <i class="bi {{ $s <= $rf ? 'bi-star-fill' : 'bi-star' }} star-rating" style="font-size:.7rem"></i>
                    @endfor
                  </div>
                </div>
              </div>
              <div class="fw-bold small mb-1">{{ $rev['title'] }}</div>
              <p class="small text-secondary mb-0">{{ $rev['body'] }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  {{-- Related products --}}
  <div class="mb-2">
    <h2 class="h5 fw-bold mb-3">You May Also Like</h2>
    <div class="row g-3">
      @foreach ($related as $p)
        @php
          $pf = (int) floor($p['rating']);
          $ph = $p['rating'] - $pf >= 0.5;
          $pd = $p['old_price'] ? (int) round((1 - $p['price'] / $p['old_price']) * 100) : 0;
        @endphp
        <div class="col-sm-6 col-xl-3">
          <a href="{{ route('ecommerce.detail', $p['id']) }}" class="text-decoration-none text-body">
            <div class="product-card">
              <div class="product-img" style="background:{{ $p['bg'] }}">
                <i class="bi {{ $p['icon'] }} product-icon" style="color:{{ $p['color'] }}"></i>
                @if ($p['badge'])
                  <span class="product-badge badge bg-{{ $p['badge_tone'] }}">{{ $p['badge'] }}</span>
                @elseif ($pd > 0)
                  <span class="product-badge badge bg-danger">-{{ $pd }}%</span>
                @endif
              </div>
              <div class="product-body">
                <div class="small text-secondary mb-1">{{ $p['category'] }}</div>
                <div class="product-name mb-2">{{ $p['name'] }}</div>
                <div class="d-flex align-items-center gap-1 mb-2">
                  @for ($s = 1; $s <= 5; $s++)
                    <i class="bi {{ $s <= $pf ? 'bi-star-fill' : ($ph && $s === $pf + 1 ? 'bi-star-half' : 'bi-star') }} star-rating"></i>
                  @endfor
                  <span class="small text-secondary ms-1">{{ number_format($p['rating'], 1) }}</span>
                </div>
                <div class="d-flex align-items-center gap-2 mb-3">
                  <span class="fw-bold">${{ number_format($p['price'], 2) }}</span>
                  @if ($p['old_price'])
                    <span class="text-secondary text-decoration-line-through small">${{ number_format($p['old_price'], 2) }}</span>
                  @endif
                </div>
                <button class="btn btn-primary btn-sm w-100">
                  <i class="bi bi-cart-plus me-1"></i>Add to Cart
                </button>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
@endsection
