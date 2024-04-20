<form wire:submit.prevent='addUser' class="card mt-3">
  <div class="card-header">
    <h4 class="card-title mb-0">Slider Content</h4>
  </div>
  <div class="card-body">
    <div class="row g-3 px-5">
      <div class="col-md-6">
        <label class="form-label small text-muted">Name</label>
        <input type="text" wire:model.lazy='name' class="form-control" placeholder="Name">
        @error('name')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-6">
        <label class="form-label small text-muted">Email address</label>
        <input type="email" wire:model.lazy='email' class="form-control" placeholder="Email">
        @error('email')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-6">
        <label class="form-label small text-muted">Password</label>
        <input type="password" wire:model.lazy='password' class="form-control" placeholder="****************">
        @error('password')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-6">
        <label class="form-label small text-muted">Confirm Password</label>
        <input type="password" wire:model.lazy='password_confirmation' class="form-control"
          placeholder="****************">
      </div>
    </div>
  </div>
  <div class="card-footer text-end">
    <a href="{{ route('admin.user') }}" class="btn bg-dark text-white btn-block">Back</a>
    <button type="submit" class="btn bg-dark text-white btn-block">Submit</button>
  </div>
</form>
