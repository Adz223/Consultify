<main class="page-body">
    <div class="container-fluid">
        <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
            <div class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
                <form wire:submit.prevent='addConsultant' class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Consultant</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 px-5">
                            <div class="col-md-6">
                                <label class="form-label small text-muted">First Name</label>
                                <input type="text" wire:model.lazy='first_name' class="form-control" placeholder="First Name">
                                @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Last Name</label>
                                <input type="text" wire:model.lazy='last_name' class="form-control" placeholder="Last Name">
                                @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Email address</label>
                                <input type="email" wire:model.lazy='email' class="form-control" placeholder="Email">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Service</label>
                                <select wire:model.lazy='service' class="form-control">
                                    <option value="">Please select a service</option>
                                    @foreach ($services as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('service') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Password</label>
                                <input type="password" wire:model.lazy='password' class="form-control" placeholder="****************">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Confirm Password</label>
                                <input type="password" wire:model.lazy='password_confirmation' class="form-control" placeholder="****************">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('admin.consultant') }}" class="btn bg-dark text-white btn-block">Back</a>
                        <button type="submit" class="btn bg-dark text-white btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
