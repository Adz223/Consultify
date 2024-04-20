<form wire:submit.prevent='updateSocialLinks' class="card mt-3">
    <div class="card-header">
      <h4 class="card-title mb-0">Social Links</h4>
    </div>
    <div class="card-body">
      <div class="row g-3 px-5">
        <div class="col-md-6">
          <label class="form-label small text-muted">Email address</label>
          <input type="email" wire:model.lazy='email' class="form-control" placeholder="Email">
          @error('email')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-md-6">
          <label class="form-label small text-muted">Contact #</label>
          <input type="number" wire:model.lazy='contact' class="form-control">
          @error('contact')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-md-6">
          <label class="form-label small text-muted">Address</label>
          <input type="text" wire:model.lazy='address' class="form-control">
          @error('address')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-md-6">
          <label class="form-label small text-muted">City</label>
          <input type="text" wire:model.lazy='city' class="form-control">
          @error('city')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-md-6">
          <label class="form-label small text-muted">State</label>
          <input type="text" wire:model.lazy='state' class="form-control">
          @error('state')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-md-6">
          <label class="form-label small text-muted">Country</label>
          <input type="text" wire:model.lazy='country' class="form-control">
          @error('country')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        @if (!empty($msg))
          <div class="col-md-12">
            <div class="alert alert-primary" role="alert">
              <strong>Success</strong> {{ $msg }}
            </div>
          </div>
        @endif
        <div class="col-md-12 text-end">
          <button type="submit" class="btn bg-dark text-white btn-block">Submit</button>
        </div>
      </div>
    </div>
  </form>
