@php
  $tags = old('tags', $product->tags ?? []);
  $tagsValue = is_array($tags) ? implode(', ', $tags) : $tags;
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="p-3 p-md-4">
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
      <label class="form-label" for="thumbnail">Thumbnail Image</label>
      <div class="kit-uploader @error('thumbnail') is-invalid @enderror @if ($product->thumbnail_url) is-filled @endif" data-uploader>
        <input class="kit-uploader__input" id="thumbnail" name="thumbnail" type="file" accept="image/*" data-uploader-input>
        <label class="kit-dropzone kit-uploader__zone" for="thumbnail" data-uploader-zone>
          <i class="bi bi-image kit-uploader__icon"></i>
          <span class="fw-semibold">Pilih gambar thumbnail</span>
          <span class="small text-secondary mt-1">Klik atau seret gambar ke sini · maks 2 MB</span>
        </label>
        <div class="kit-uploader__preview" data-uploader-preview>
          <img class="kit-uploader__image" alt="Thumbnail preview" data-uploader-image
               src="{{ $product->thumbnail_url ?? '' }}">
          <button class="kit-uploader__remove btn btn-sm" type="button" data-uploader-remove
                  title="Hapus gambar">
            <i class="bi bi-x-lg"></i>
          </button>
          <span class="kit-uploader__name small text-truncate" data-uploader-name>@if ($product->thumbnail_url){{ basename($product->thumbnail) }}@endif</span>
        </div>
      </div>
      @error('thumbnail')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
      @if ($product->thumbnail_url)
        <a class="text-secondary small d-inline-block mt-2" href="{{ $product->thumbnail_url }}" target="_blank" rel="noopener">
          <i class="bi bi-box-arrow-up-right"></i> Lihat thumbnail saat ini
        </a>
      @endif
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

@push('scripts')
  <script>
    document.querySelectorAll('[data-uploader]').forEach(function (uploader) {
      var input = uploader.querySelector('[data-uploader-input]');
      var zone = uploader.querySelector('[data-uploader-zone]');
      var image = uploader.querySelector('[data-uploader-image]');
      var name = uploader.querySelector('[data-uploader-name]');
      var removeBtn = uploader.querySelector('[data-uploader-remove]');
      if (!input || !image) return;

      function showFile(file) {
        var reader = new FileReader();
        reader.onload = function (e) {
          image.src = e.target.result;
          if (name) name.textContent = file.name;
          uploader.classList.add('is-filled');
        };
        reader.readAsDataURL(file);
      }

      function clear() {
        input.value = '';
        image.removeAttribute('src');
        if (name) name.textContent = '';
        uploader.classList.remove('is-filled');
      }

      input.addEventListener('change', function () {
        var file = input.files && input.files[0];
        if (file && file.type.indexOf('image/') === 0) {
          showFile(file);
        }
      });

      if (removeBtn) {
        removeBtn.addEventListener('click', clear);
      }

      ['dragenter', 'dragover'].forEach(function (evt) {
        zone.addEventListener(evt, function (e) {
          e.preventDefault();
          uploader.classList.add('is-dragging');
        });
      });
      ['dragleave', 'drop'].forEach(function (evt) {
        zone.addEventListener(evt, function (e) {
          e.preventDefault();
          uploader.classList.remove('is-dragging');
        });
      });
      zone.addEventListener('drop', function (e) {
        var file = e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files[0];
        if (file && file.type.indexOf('image/') === 0) {
          input.files = e.dataTransfer.files;
          showFile(file);
        }
      });
    });
  </script>
@endpush
