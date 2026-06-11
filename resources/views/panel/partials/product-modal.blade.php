<div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div><h2 class="modal-title h5 fw-bold">Add Product</h2><div class="small text-secondary">Complete catalog, stock, pricing, and channel details</div></div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-pills mb-3" role="tablist">
          @foreach (['tab-basic' => 'Basic', 'tab-pricing' => 'Pricing', 'tab-channel' => 'Channel'] as $id => $label)
            <li class="nav-item"><button class="nav-link @if($loop->first) active @endif" data-bs-toggle="pill" data-bs-target="#{{ $id }}" type="button">{{ $label }}</button></li>
          @endforeach
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab-basic">
            <div class="row g-3">
              <div class="col-md-6"><label class="form-label">Product Name</label><input class="form-control" placeholder="Product name"></div>
              <div class="col-md-3"><label class="form-label">SKU</label><input class="form-control" placeholder="PRD-1009"></div>
              <div class="col-md-3"><label class="form-label">Status</label><select class="form-select" data-control="select2"><option>Active</option><option>Draft</option><option>Review</option></select></div>
              <div class="col-md-6"><label class="form-label">Category</label><select class="form-select" data-control="select2"><option>Fashion</option><option>Home</option><option>Gadget</option><option>Stationery</option></select></div>
              <div class="col-md-6"><label class="form-label">Tags</label><select class="form-select" multiple data-control="select2" data-placeholder="Select tags"><option selected>Featured</option><option>Limited</option><option>Sale</option><option>New Arrival</option></select></div>
              <div class="col-12"><label class="form-label">Description</label><textarea class="form-control" rows="3" placeholder="Short product description"></textarea></div>
            </div>
          </div>
          <div class="tab-pane fade" id="tab-pricing">
            <div class="row g-3">
                <div class="col-md-4"><label class="form-label">Price</label><input class="form-control" placeholder="$0"></div>
                <div class="col-md-4"><label class="form-label">Discount</label><input class="form-control" placeholder="0%"></div>
                <div class="col-md-4"><label class="form-label">Initial Stock</label><input class="form-control" type="number" value="10"></div>
            </div>
          </div>
          <div class="tab-pane fade" id="tab-channel">
            <div class="row g-3">
              <div class="col-12"><label class="form-label">Sales Channels</label><select class="form-select" multiple data-control="select2" data-placeholder="Select channels"><option selected>Website</option><option>Marketplace</option><option>Retail</option><option>Reseller</option></select></div>
              <div class="col-12"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="publishNow" checked><label class="form-check-label" for="publishNow">Publish after saving</label></div></div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer"><button class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button><button class="btn btn-primary">Save Product</button></div>
    </div>
  </div>
</div>
