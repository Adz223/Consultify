<main class="page-body">
    <div class="container-fluid">
        <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
            <div class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
                <form wire:submit.prevent='addService' class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Service</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 px-5">
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Name</label>
                                <input type="text" wire:model.lazy='name' class="form-control" placeholder="Name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Price (GBP)</label>
                                <input type="number" wire:model.lazy='price' class="form-control" placeholder="123">
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Price (EUR)</label>
                                <input type="number" wire:model.lazy='eur_price' class="form-control" placeholder="123">
                                @error('eur_price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Price (MAD)</label>
                                <input type="number" wire:model.lazy='mad_price' class="form-control" placeholder="123">
                                @error('mad_price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label small text-muted">Description</label>
                                <textarea wire:model.lazy='description' class="form-control" placeholder="..."></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('admin.service') }}" class="btn bg-dark text-white btn-block">Back</a>
                        <button type="submit" class="btn bg-dark text-white btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
