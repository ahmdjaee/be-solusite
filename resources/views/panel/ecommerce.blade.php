@extends('layouts.app')

@section('breadcrumb')
  <li class="breadcrumb-item">Template</li>
@endsection

@section('content')
  {{-- Search & controls bar --}}
  <div class="surface p-3 p-md-4 mb-3">
    <div class="d-flex flex-wrap gap-3 align-items-center">
      <div class="flex-fill" style="min-width:180px">
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-search"></i></span>
          <input class="form-control" type="search" placeholder="Search products, brands, categories&hellip;">
        </div>
      </div>
      <div class="d-flex gap-2 align-items-center flex-wrap">
        <select class="form-select" style="width:auto">
          <option selected>Featured</option>
          <option>Price: Low &rarr; High</option>
          <option>Price: High &rarr; Low</option>
          <option>Best Rating</option>
          <option>Newest First</option>
        </select>
        <div class="btn-group" role="group" aria-label="View mode">
          <button class="btn btn-primary" title="Grid view"><i class="bi bi-grid-3x3-gap-fill"></i></button>
          <button class="btn btn-outline-primary" title="List view"><i class="bi bi-list-ul"></i></button>
        </div>
        <button class="btn btn-outline-primary position-relative" title="Cart">
          <i class="bi bi-cart3"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:.6rem">3</span>
        </button>
      </div>
    </div>
  </div>

  {{-- Category tabs --}}
  <div class="surface mb-3" style="overflow-x:auto;scrollbar-width:none">
    <div class="d-flex gap-1 p-2">
      @foreach ($categories as $i => $cat)
        <button class="btn {{ $i === 0 ? 'btn-primary' : 'btn-outline-secondary' }} btn-sm d-inline-flex align-items-center gap-2 shrink-0">
          <i class="bi {{ $cat['icon'] }}"></i>
          {{ $cat['label'] }}
          <span class="badge {{ $i === 0 ? 'bg-white text-primary' : 'bg-body-secondary text-secondary' }}">{{ $cat['count'] }}</span>
        </button>
      @endforeach
    </div>
  </div>

  <div class="row g-3">
    {{-- Filter sidebar (desktop) --}}
    <div class="col-lg-3 d-none d-lg-block">
      <div class="surface overflow-hidden">
        {{-- Price range --}}
        <div class="shop-filter-section">
          <div class="shop-filter-title">Price Range</div>
          <div class="d-flex gap-2 align-items-center mb-2">
            <input class="form-control form-control-sm text-center" type="number" value="0" placeholder="Min" style="width:72px">
            <span class="text-secondary small">&mdash;</span>
            <input class="form-control form-control-sm text-center" type="number" value="300" placeholder="Max" style="width:72px">
          </div>
          <input class="form-range" type="range" min="0" max="500" value="300">
          <div class="d-flex justify-content-between small text-secondary"><span>$0</span><span>$500</span></div>
        </div>

        {{-- Categories --}}
        <div class="shop-filter-section">
          <div class="shop-filter-title">Category</div>
          <div class="d-grid gap-2">
            @foreach ($categories as $i => $cat)
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="fc{{ $i }}" @checked($i === 0)>
                <label class="form-check-label d-flex justify-content-between" for="fc{{ $i }}">
                  <span>{{ $cat['label'] }}</span>
                  <span class="text-secondary small">{{ $cat['count'] }}</span>
                </label>
              </div>
            @endforeach
          </div>
        </div>

        {{-- Brands --}}
        <div class="shop-filter-section">
          <div class="shop-filter-title">Brand</div>
          <div class="d-grid gap-2">
            @foreach (['SoluTech', 'NovaBrand', 'PureEssentials', 'ActiveGear', 'HomeForm'] as $brand)
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="fb{{ $loop->index }}">
                <label class="form-check-label" for="fb{{ $loop->index }}">{{ $brand }}</label>
              </div>
            @endforeach
          </div>
        </div>

        {{-- Rating --}}
        <div class="shop-filter-section">
          <div class="shop-filter-title">Rating</div>
          <div class="d-grid gap-2">
            @foreach ([5, 4, 3] as $r)
              <div class="form-check">
                <input class="form-check-input" type="radio" name="rating-filter" id="fr{{ $r }}" @checked($r === 4)>
                <label class="form-check-label d-flex align-items-center gap-1" for="fr{{ $r }}">
                  @for ($s = 1; $s <= 5; $s++)
                    <i class="bi {{ $s <= $r ? 'bi-star-fill' : 'bi-star' }} star-rating"></i>
                  @endfor
                  <span class="text-secondary small ms-1">&amp; up</span>
                </label>
              </div>
            @endforeach
          </div>
        </div>

        {{-- Availability --}}
        <div class="shop-filter-section">
          <div class="shop-filter-title">Availability</div>
          <div class="form-check form-switch mb-0">
            <input class="form-check-input" type="checkbox" id="fstock" checked>
            <label class="form-check-label" for="fstock">In Stock Only</label>
          </div>
        </div>

        <div class="shop-filter-section">
          <button class="btn btn-outline-secondary btn-sm w-100">Clear All Filters</button>
        </div>
      </div>
    </div>

    {{-- Product grid --}}
    <div class="col-lg-9">
      {{-- Results bar --}}
      <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <div class="text-secondary small">
          Showing <strong>1&ndash;{{ count($products) }}</strong> of <strong>248</strong> products
        </div>
        <div class="d-flex gap-2">
          {{-- Active filter tags --}}
          <button class="shop-tag">
            All Categories <span class="shop-tag-close" aria-label="Remove">&times;</span>
          </button>
          <button class="shop-tag">
            Rating: 4&star;+ <span class="shop-tag-close" aria-label="Remove">&times;</span>
          </button>
          <button class="shop-tag">
            In Stock <span class="shop-tag-close" aria-label="Remove">&times;</span>
          </button>
          <button class="btn btn-sm btn-outline-secondary d-lg-none ms-1">
            <i class="bi bi-funnel me-1"></i>Filters
          </button>
        </div>
      </div>

      {{-- Products --}}
      <div class="row g-3">
        @foreach ($products as $p)
          @php
            $full = (int) floor($p['rating']);
            $half = $p['rating'] - $full >= 0.5;
            $disc = $p['old_price'] ? (int) round((1 - $p['price'] / $p['old_price']) * 100) : 0;
          @endphp
          <div class="col-sm-6 col-xl-4">
            <div class="product-card" style="cursor:pointer" onclick="location.href='{{ route('ecommerce.detail', $p['id']) }}'">
              <div class="product-img" style="background:{{ $p['bg'] }}">
                <i class="bi {{ $p['icon'] }} product-icon" style="color:{{ $p['color'] }}"></i>
                @if ($p['badge'])
                  <span class="product-badge badge bg-{{ $p['badge_tone'] }}">{{ $p['badge'] }}</span>
                @elseif ($disc > 0)
                  <span class="product-badge badge bg-danger">-{{ $disc }}%</span>
                @endif
                <button class="product-wishlist" title="Add to wishlist">
                  <i class="bi bi-heart"></i>
                </button>
              </div>
              <div class="product-body">
                <div class="small text-secondary mb-1">{{ $p['category'] }}</div>
                <div class="product-name mb-2">{{ $p['name'] }}</div>
                <div class="d-flex align-items-center gap-1 mb-2">
                  @for ($s = 1; $s <= 5; $s++)
                    <i class="bi {{ $s <= $full ? 'bi-star-fill' : ($half && $s === $full + 1 ? 'bi-star-half' : 'bi-star') }} star-rating"></i>
                  @endfor
                  <span class="small text-secondary ms-1">{{ number_format($p['rating'], 1) }} ({{ number_format($p['reviews']) }})</span>
                </div>
                <div class="d-flex align-items-center gap-2 mb-3">
                  <span class="fw-bold" style="font-size:1.05rem">${{ number_format($p['price'], 2) }}</span>
                  @if ($p['old_price'])
                    <span class="text-secondary text-decoration-line-through small">${{ number_format($p['old_price'], 2) }}</span>
                    <span class="badge bg-danger bg-opacity-10 text-danger">-{{ $disc }}%</span>
                  @endif
                </div>
                <div class="d-flex gap-2">
                  <button class="btn btn-primary btn-sm flex-fill">
                    <i class="bi bi-cart-plus me-1"></i>Add to Cart
                  </button>
                  <button class="btn btn-outline-secondary btn-sm" title="Quick view">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      {{-- Pagination --}}
      <div class="d-flex flex-wrap justify-content-between align-items-center mt-4 gap-3">
        <div class="text-secondary small">Page 1 of 16 &mdash; 248 products total</div>
        <nav aria-label="Product pages">
          <ul class="pagination pagination-sm mb-0">
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">&laquo;</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&hellip;</a></li>
            <li class="page-item"><a class="page-link" href="#">16</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
@endsection
