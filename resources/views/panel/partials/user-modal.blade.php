<div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header"><div><h2 class="modal-title h5 fw-bold">Invite User</h2><div class="small text-secondary">Create an invitation and assign an initial role</div></div><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
      <div class="modal-body">
        <div class="row g-3">
          <div class="col-md-6"><label class="form-label">Name</label><input class="form-control" placeholder="Full name"></div>
          <div class="col-md-6"><label class="form-label">Email</label><input class="form-control" type="email" placeholder="name@example.com"></div>
          <div class="col-md-6"><label class="form-label">Role</label><select class="form-select" data-control="select2"><option>Admin</option><option>Editor</option><option>Support</option><option>Finance</option></select></div>
          <div class="col-md-6"><label class="form-label">Team</label><select class="form-select" data-control="select2"><option>Operations</option><option>Finance</option><option>Customer Success</option><option>Sales</option></select></div>
          <div class="col-12"><label class="form-label">Module Access</label><select class="form-select" multiple data-control="select2" data-placeholder="Select modules"><option selected>Dashboard</option><option>Orders</option><option>Products</option><option>Reports</option><option>Settings</option></select></div>
        </div>
      </div>
      <div class="modal-footer"><button class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button><button class="btn btn-primary">Send Invite</button></div>
    </div>
  </div>
</div>
