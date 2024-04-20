<div class="row">
  <div class="col">
    <form wire:submit.prevent='updateProfile' class="card mt-3">
      <div class="card-header text-center">
        <h4 class="card-title mb-0">Profile Update</h4>
      </div>
      <div class="card-body">
        <div class="row g-3 px-1">
          <div class="col-md-12">
            <label class="form-label small text-muted">Name</label>
            <input type="text" wire:model.lazy='name' class="form-control" placeholder="Name">
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-md-12">
            <label class="form-label small text-muted">Email</label>
            <input type="email" wire:model.lazy='email' class="form-control" placeholder="Email">
            @error('email')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-md-12">
            <label class="form-label small text-muted">Password</label>
            <input type="password" wire:model.lazy='checkPassword' class="form-control" placeholder="****************">
            @error('checkPassword')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          @if (!empty($profileMsg))
            <div class="alert alert-primary" role="alert">
              <strong>Success</strong> {{ $profileMsg }}
            </div>
          @endif
          <div class="col-md-12 text-end">
            <button type="submit" class="btn float-right bg-dark text-white btn-block">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="col">
    <form wire:submit.prevent='updatePassword' class="card mt-3">
      <div class="card-header text-center">
        <h4 class="card-title mb-0">Password Update</h4>
      </div>
      <div class="card-body">
        <div class="row g-3 px-1">
          <div class="col-md-12">
            <label class="form-label small text-muted">Current Password</label>
            <input type="password" wire:model.lazy='oldPassword' class="form-control" placeholder="****************">
            @error('oldPassword')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-md-12">
            <label class="form-label small text-muted">New Password</label>
            <input type="password" wire:model.lazy='password' class="form-control" placeholder="****************">
            @error('password')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-md-12">
            <label class="form-label small text-muted">Confirm New Password</label>
            <input type="password" wire:model.lazy='password_confirmation' class="form-control"
              placeholder="****************">
          </div>
          @if (!empty($pwdMsg))
            <div class="alert alert-primary" role="alert">
              <strong>Success</strong> {{ $pwdMsg }}
            </div>
          @endif
          <div class="col-md-12 text-end">
            <button type="submit" class="btn float-right bg-dark text-white btn-block">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
