@php
  $tags = old('tags', $product->tags ?? []);
  $tagsValue = is_array($tags) ? implode(', ', $tags) : $tags;
@endphp

<form action="{{ $action }}" method="POST" class="p-3 p-md-4">
  @csrf
  @if ($method !== 'POST')
    @method($method)
  @endif

  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label" for="name">Name</label>
      <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}" required>
      @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
      <label class="form-label" for="short">Short</label>
      <input class="form-control @error('short') is-invalid @enderror" id="short" name="short" value="{{ old('short', $product->short) }}" required>
      @error('short')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
      <label class="form-label" for="description">Description</label>
      <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $product->description) }}</textarea>
      @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
      <label class="form-label" for="price">Price</label>
      <input class="form-control @error('price') is-invalid @enderror" id="price" name="price" type="number" min="0" step="0.01" value="{{ old('price', $product->price) }}" required>
      @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
      <label class="form-label" for="label">Label</label>
      <input class="form-control @error('label') is-invalid @enderror" id="label" name="label" value="{{ old('label', $product->label) }}">
      @error('label')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
      <label class="form-label" for="status">Status</label>
      <input class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status', $product->status) }}" required>
      @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
      <label class="form-label" for="type">Type</label>
      <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
        @foreach (['app' => 'App', 'source-code' => 'Source Code'] as $value => $label)
          <option value="{{ $value }}" @selected(old('type', $product->type) === $value)>{{ $label }}</option>
        @endforeach
      </select>
      @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
      <label class="form-label" for="availability">Availability</label>
      <select class="form-select @error('availability') is-invalid @enderror" id="availability" name="availability" required>
        @foreach (['ready' => 'Ready', 'custom' => 'Custom'] as $value => $label)
          <option value="{{ $value }}" @selected(old('availability', $product->availability) === $value)>{{ $label }}</option>
        @endforeach
      </select>
      @error('availability')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
      <label class="form-label" for="thumbnail">Thumbnail URL</label>
      <input class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail" value="{{ old('thumbnail', $product->thumbnail) }}">
      @error('thumbnail')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
      <label class="form-label" for="tags">Tags</label>
      <textarea class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" rows="2">{{ $tagsValue }}</textarea>
      @error('tags')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>

  <div class="d-flex justify-content-end gap-2 mt-4">
    <a class="btn btn-outline-secondary" href="{{ route('admin.products.index') }}">Cancel</a>
    <button class="btn btn-primary" type="submit">{{ $submit }}</button>
  </div>
</form>
