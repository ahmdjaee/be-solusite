<form action="{{ $action }}" method="POST" class="p-3 p-md-4">
  @csrf
  @if ($method !== 'POST') @method($method) @endif
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label" for="product_id">Product</label>
      <select class="form-select @error('product_id') is-invalid @enderror" id="product_id" name="product_id" required>
        <option value="">Choose product</option>
        @foreach ($products as $product)
          <option value="{{ $product->id }}" @selected((int) old('product_id', $discount->product_id) === $product->id)>{{ $product->name }}</option>
        @endforeach
      </select>
      @error('product_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
      <label class="form-label" for="type">Type</label>
      <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
        @foreach (['percentage' => 'Percentage', 'fixed' => 'Fixed'] as $value => $label)
          <option value="{{ $value }}" @selected(old('type', $discount->type) === $value)>{{ $label }}</option>
        @endforeach
      </select>
      @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
      <label class="form-label" for="value">Value</label>
      <input class="form-control @error('value') is-invalid @enderror" id="value" name="value" type="number" min="0.01" step="0.01" value="{{ old('value', $discount->value) }}" required>
      @error('value')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
      <label class="form-label" for="starts_at">Starts At</label>
      <input class="form-control @error('starts_at') is-invalid @enderror" id="starts_at" name="starts_at" type="datetime-local" value="{{ old('starts_at', $discount->starts_at?->format('Y-m-d\\TH:i')) }}">
      @error('starts_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
      <label class="form-label" for="ends_at">Ends At</label>
      <input class="form-control @error('ends_at') is-invalid @enderror" id="ends_at" name="ends_at" type="datetime-local" value="{{ old('ends_at', $discount->ends_at?->format('Y-m-d\\TH:i')) }}">
      @error('ends_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4 d-flex align-items-end">
      <div class="form-check form-switch mb-2">
        <input class="form-check-input" id="is_active" name="is_active" type="checkbox" value="1" @checked(old('is_active', $discount->is_active))>
        <label class="form-check-label" for="is_active">Active</label>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-end gap-2 mt-4">
    <a class="btn btn-outline-secondary" href="{{ route('admin.discounts.index') }}">Cancel</a>
    <button class="btn btn-primary" type="submit">{{ $submit }}</button>
  </div>
</form>
