@php
  $features = old('features', $plan->features ?? []);
  $featuresValue = is_array($features) ? implode(', ', $features) : $features;
@endphp

<form action="{{ $action }}" method="POST" class="p-3 p-md-4">
  @csrf
  @if ($method !== 'POST') @method($method) @endif
  <div class="row g-3">
    <div class="col-md-8">
      <label class="form-label" for="name">Name</label>
      <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $plan->name) }}" required>
      @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
      <label class="form-label" for="price">Price</label>
      <input class="form-control @error('price') is-invalid @enderror" id="price" name="price" type="number" min="0" step="0.01" value="{{ old('price', $plan->price) }}" required>
      @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
      <label class="form-label" for="description">Description</label>
      <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $plan->description) }}</textarea>
      @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-8">
      <label class="form-label" for="features">Features</label>
      <textarea class="form-control @error('features') is-invalid @enderror" id="features" name="features" rows="3">{{ $featuresValue }}</textarea>
      @error('features')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4 d-flex align-items-end">
      <div class="form-check form-switch mb-2">
        <input class="form-check-input" id="highlight" name="highlight" type="checkbox" value="1" @checked(old('highlight', $plan->highlight))>
        <label class="form-check-label" for="highlight">Highlight plan</label>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-end gap-2 mt-4">
    <a class="btn btn-outline-secondary" href="{{ route('admin.plans.index') }}">Cancel</a>
    <button class="btn btn-primary" type="submit">{{ $submit }}</button>
  </div>
</form>
