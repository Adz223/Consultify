<main class="page-body">
    <div class="container-fluid">
        <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
            <div class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
                <form wire:submit.prevent='updateUser' class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title mb-0">User</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 px-5">
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Name</label>
                                <input type="text" wire:model.lazy='name' class="form-control" placeholder="Name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Email address</label>
                                <input type="email" wire:model.lazy='email' class="form-control" placeholder="Email">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('admin.user') }}" class="btn bg-dark text-white btn-block">Back</a>
                        <button type="submit" class="btn bg-dark text-white btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
