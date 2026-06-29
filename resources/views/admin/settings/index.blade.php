@extends('admin.layouts.app')

@section('content')
  <x-table-card title="Settings" subtitle="Identitas situs, kontak CTA, dan media sosial — dipakai storefront.">
    <x-slot:actions>
      <button class="btn btn-primary" type="submit" form="settings-form"><i class="bi bi-save me-1"></i>Save</button>
    </x-slot:actions>

    <form id="settings-form" action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="p-3 p-md-4">
      @csrf
      @method('PUT')

      <ul class="nav nav-pills mb-4" role="tablist">
        @foreach (['branding' => 'Branding', 'contact' => 'Kontak & CTA', 'social' => 'Media Sosial', 'seo' => 'SEO'] as $id => $label)
          <li class="nav-item" role="presentation">
            <button class="nav-link @if ($loop->first) active @endif" id="tab-{{ $id }}" data-bs-toggle="pill" data-bs-target="#pane-{{ $id }}" type="button" role="tab">{{ $label }}</button>
          </li>
        @endforeach
      </ul>

      <div class="tab-content">
        {{-- ============ BRANDING ============ --}}
        <div class="tab-pane fade show active" id="pane-branding" role="tabpanel">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label" for="logo">Logo</label>
              <div class="kit-uploader @if (!empty($settings['logo_url'])) is-filled @endif" data-uploader>
                <input class="kit-uploader__input" id="logo" name="logo" type="file" accept="image/*" data-uploader-input>
                <label class="kit-dropzone kit-uploader__zone" for="logo" data-uploader-zone>
                  <i class="bi bi-image kit-uploader__icon"></i>
                  <span class="fw-semibold">Pilih gambar logo</span>
                  <span class="small text-secondary mt-1">Klik atau seret gambar ke sini · maks 2 MB</span>
                </label>
                <div class="kit-uploader__preview" data-uploader-preview>
                  <img class="kit-uploader__image" alt="Logo preview" data-uploader-image src="{{ $settings['logo_url'] ?? '' }}">
                  <button class="kit-uploader__remove btn btn-sm" type="button" data-uploader-remove title="Hapus gambar"><i class="bi bi-x-lg"></i></button>
                  <span class="kit-uploader__name small text-truncate" data-uploader-name></span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label" for="site_name">Nama Situs</label>
                  <input class="form-control" id="site_name" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? '') }}">
                </div>
                <div class="col-12">
                  <label class="form-label" for="tagline">Tagline</label>
                  <input class="form-control" id="tagline" name="tagline" value="{{ old('tagline', $settings['tagline'] ?? '') }}">
                  <div class="form-text">Deskripsi singkat yang muncul di header/hero.</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- ============ KONTAK & CTA ============ --}}
        <div class="tab-pane fade" id="pane-contact" role="tabpanel">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label" for="whatsapp_number">Nomor WhatsApp</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-whatsapp text-success"></i></span>
                <input class="form-control" id="whatsapp_number" name="whatsapp_number" value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '') }}" placeholder="6281234567890">
              </div>
              <div class="form-text">Format internasional tanpa <code>+</code> atau spasi (mis. <code>62812...</code>).</div>
            </div>
            <div class="col-md-6">
              <label class="form-label" for="email">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input class="form-control" id="email" name="email" type="email" value="{{ old('email', $settings['email'] ?? '') }}" placeholder="hello@solusite.studio">
              </div>
            </div>
            <div class="col-12">
              <label class="form-label" for="whatsapp_message">Pesan WhatsApp Default</label>
              <textarea class="form-control" id="whatsapp_message" name="whatsapp_message" rows="2" placeholder="Teks otomatis saat tombol WhatsApp diklik">{{ old('whatsapp_message', $settings['whatsapp_message'] ?? '') }}</textarea>
            </div>
            <div class="col-md-6">
              <label class="form-label" for="phone">Telepon</label>
              <input class="form-control" id="phone" name="phone" value="{{ old('phone', $settings['phone'] ?? '') }}">
            </div>
            <div class="col-md-6">
              <label class="form-label" for="address">Alamat</label>
              <input class="form-control" id="address" name="address" value="{{ old('address', $settings['address'] ?? '') }}">
            </div>
          </div>
        </div>

        {{-- ============ MEDIA SOSIAL ============ --}}
        <div class="tab-pane fade" id="pane-social" role="tabpanel">
          <div class="row g-3">
            @foreach ([
              'instagram_url' => ['Instagram', 'bi-instagram'],
              'facebook_url' => ['Facebook', 'bi-facebook'],
              'tiktok_url' => ['TikTok', 'bi-tiktok'],
              'youtube_url' => ['YouTube', 'bi-youtube'],
            ] as $field => [$label, $icon])
              <div class="col-md-6">
                <label class="form-label" for="{{ $field }}">{{ $label }}</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi {{ $icon }}"></i></span>
                  <input class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ old($field, $settings[$field] ?? '') }}" placeholder="https://...">
                </div>
              </div>
            @endforeach
          </div>
        </div>

        {{-- ============ SEO ============ --}}
        <div class="tab-pane fade" id="pane-seo" role="tabpanel">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label" for="meta_title">Meta Title</label>
              <input class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $settings['meta_title'] ?? '') }}" maxlength="255">
              <div class="form-text">Judul default di tab browser & hasil pencarian (±60 karakter ideal).</div>
            </div>
            <div class="col-12">
              <label class="form-label" for="meta_description">Meta Description</label>
              <textarea class="form-control" id="meta_description" name="meta_description" rows="2" maxlength="500">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
              <div class="form-text">Ringkasan situs untuk Google (±155 karakter ideal).</div>
            </div>
            <div class="col-12">
              <label class="form-label" for="meta_keywords">Meta Keywords</label>
              <textarea class="form-control" id="meta_keywords" name="meta_keywords" rows="2" maxlength="500" placeholder="cms, website, toko online">{{ old('meta_keywords', $settings['meta_keywords'] ?? '') }}</textarea>
              <div class="form-text">Pisahkan dengan koma.</div>
            </div>
            <div class="col-md-6">
              <label class="form-label" for="og_image">OG Image <span class="text-secondary small">(preview saat dibagikan)</span></label>
              <div class="kit-uploader @if (!empty($settings['og_image_url'])) is-filled @endif" data-uploader>
                <input class="kit-uploader__input" id="og_image" name="og_image" type="file" accept="image/*" data-uploader-input>
                <label class="kit-dropzone kit-uploader__zone" for="og_image" data-uploader-zone>
                  <i class="bi bi-image kit-uploader__icon"></i>
                  <span class="fw-semibold">Pilih gambar share</span>
                  <span class="small text-secondary mt-1">Rasio 1200×630 · maks 2 MB</span>
                </label>
                <div class="kit-uploader__preview" data-uploader-preview>
                  <img class="kit-uploader__image" alt="OG image preview" data-uploader-image src="{{ $settings['og_image_url'] ?? '' }}">
                  <button class="kit-uploader__remove btn btn-sm" type="button" data-uploader-remove title="Hapus gambar"><i class="bi bi-x-lg"></i></button>
                  <span class="kit-uploader__name small text-truncate" data-uploader-name></span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label" for="google_analytics_id">Google Analytics ID</label>
                  <input class="form-control" id="google_analytics_id" name="google_analytics_id" value="{{ old('google_analytics_id', $settings['google_analytics_id'] ?? '') }}" placeholder="G-XXXXXXXXXX">
                </div>
                <div class="col-12">
                  <label class="form-label" for="google_site_verification">Google Site Verification</label>
                  <input class="form-control" id="google_site_verification" name="google_site_verification" value="{{ old('google_site_verification', $settings['google_site_verification'] ?? '') }}" placeholder="kode meta verification">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
        <button class="btn btn-primary" type="submit"><i class="bi bi-save me-1"></i>Save Settings</button>
      </div>
    </form>
  </x-table-card>
@endsection

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
        if (file && file.type.indexOf('image/') === 0) showFile(file);
      });
      if (removeBtn) removeBtn.addEventListener('click', clear);

      ['dragenter', 'dragover'].forEach(function (evt) {
        zone.addEventListener(evt, function (e) { e.preventDefault(); uploader.classList.add('is-dragging'); });
      });
      ['dragleave', 'drop'].forEach(function (evt) {
        zone.addEventListener(evt, function (e) { e.preventDefault(); uploader.classList.remove('is-dragging'); });
      });
      zone.addEventListener('drop', function (e) {
        var file = e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files[0];
        if (file && file.type.indexOf('image/') === 0) { input.files = e.dataTransfer.files; showFile(file); }
      });
    });
  </script>
@endpush
