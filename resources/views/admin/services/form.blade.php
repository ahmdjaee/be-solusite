@php
  $features = old('features', $service->features ?? []);
  $featuresValue = is_array($features) ? implode(', ', $features) : $features;
@endphp

<form action="{{ $action }}" method="POST" class="p-3 p-md-4">
  @csrf
  @if ($method !== 'POST') @method($method) @endif
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label" for="name">Name</label>
      <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $service->name) }}" required>
      @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-3">
      <label class="form-label" for="level">Level</label>
      <input class="form-control @error('level') is-invalid @enderror" id="level" name="level" value="{{ old('level', $service->level) }}" required>
      @error('level')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-3">
      <label class="form-label" for="price">Price</label>
      <input class="form-control @error('price') is-invalid @enderror" id="price" name="price" type="number" min="0" step="0.01" value="{{ old('price', $service->price) }}" required>
      @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
      <label class="form-label" for="description">Description</label>
      <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $service->description) }}</textarea>
      @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
      <label class="form-label" for="availability">Availability</label>
      <select class="form-select @error('availability') is-invalid @enderror" id="availability" name="availability" required>
        @foreach (['ready' => 'Ready', 'custom' => 'Custom'] as $value => $label)
          <option value="{{ $value }}" @selected(old('availability', $service->availability) === $value)>{{ $label }}</option>
        @endforeach
      </select>
      @error('availability')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-8">
      <label class="form-label" for="features">Features</label>
      <textarea class="form-control @error('features') is-invalid @enderror" id="features" name="features" rows="3">{{ $featuresValue }}</textarea>
      @error('features')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>
  <div class="d-flex justify-content-end gap-2 mt-4">
    <a class="btn btn-outline-secondary" href="{{ route('admin.services.index') }}">Cancel</a>
    <button class="btn btn-primary" type="submit">{{ $submit }}</button>
  </div>
</form>
