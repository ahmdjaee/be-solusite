@php
  $stack = old('stack', $portfolio->stack ?? []);
  $stackValue = is_array($stack) ? implode(', ', $stack) : $stack;
@endphp

<form action="{{ $action }}" method="POST" class="p-3 p-md-4">
  @csrf
  @if ($method !== 'POST') @method($method) @endif
  <div class="row g-3">
    <div class="col-12">
      <label class="form-label" for="name">Name</label>
      <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $portfolio->name) }}" required>
      @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
      <label class="form-label" for="description">Description</label>
      <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $portfolio->description) }}</textarea>
      @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
      <label class="form-label" for="stack">Stack</label>
      <textarea class="form-control @error('stack') is-invalid @enderror" id="stack" name="stack" rows="3">{{ $stackValue }}</textarea>
      @error('stack')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>
  <div class="d-flex justify-content-end gap-2 mt-4">
    <a class="btn btn-outline-secondary" href="{{ route('admin.portfolio.index') }}">Cancel</a>
    <button class="btn btn-primary" type="submit">{{ $submit }}</button>
  </div>
</form>
