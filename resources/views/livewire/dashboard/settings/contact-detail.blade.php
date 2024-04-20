<form wire:submit.prevent='updateContactDetails' class="mt-3">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title mb-0">Contact Details</h4>
    </div>
    <div class="card-body">
      @if (session()->has('error'))
        <div class="alert alert-danger fade show w-100" role="alert">
          <strong>Error!</strong> {{ session()->get('error') }}
        </div>
      @elseif (session()->has('success'))
        <div class="alert alert-success fade show w-100" role="alert">
          <strong>Success!</strong> {{ session()->get('success') }}
        </div>
      @endif
      <div class="row g-3">
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
          <input type="text" wire:model.lazy='address' class="form-control" placeholder="Address">
          @error('address')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-md-6">
          <label class="form-label small text-muted">City</label>
          <input type="text" wire:model.lazy='city' class="form-control" placeholder="City">
          @error('city')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-md-6">
          <label class="form-label small text-muted">State</label>
          <input type="text" wire:model.lazy='state' class="form-control" placeholder="State">
          @error('state')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-md-6">
          <label class="form-label small text-muted">Country</label>
          <input type="text" wire:model.lazy='country' class="form-control" placeholder="Country">
          @error('country')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        {{-- <div class="col-md-4">
            <label class="form-label small text-muted">Consultation Price</label>
            <input type="number" wire:model.lazy='consultation_price' class="form-control" placeholder="123">
            @error('consultation_price')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            </div> --}}
        {{-- <div class="col-md-12">
                <label class="form-label small text-muted">Zoom Meeting Link</label>
                <input type="text" wire:model.lazy='zoom_meeting_link' class="form-control" placeholder="Zoom Meeting Link">
                @error('zoom_meeting_link')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div> --}}
        @if ($userInfo)
          <div class="d-flex">
            @isset($userInfo['pic_url'])
              <img src="{{ $userInfo['pic_url'] }}" alt="{{ $userInfo['display_name'] }}"
                style="width:80px; border-radius:50%">
            @endisset
            <h4 class="card-title pl-2"
              @if (isset($userInfo['pic_url'])) style="line-height: 75px;margin-left: 10px;margin-top: 3px;" @endif>
              {{ $userInfo['display_name'] }}
              <img src="{{ asset('assets/img/Zoom-Logo.png') }}" alt="ZOOM" width="100">
            </h4>
          </div>
        @else
          <div class="col-md-12">
            <a class="btn btn-outline-primary btn-outline" href="{{ $zoomLink }}" role="button">Login With <img
                src="{{ asset('assets/img/Zoom-Logo.png') }}" alt="ZOOM" width="100"> </a>
          </div>
        @endif
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
  </div>
  <br />
  {{-- <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Zoom Details</h4>
        </div>
        <div class="card-body">
            <table class="w-100">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Access Token</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ahsan</td>
                        <td>12:00</td>
                        <td>
                            <a class="btn bg-primary text-white btn-block" href="" role="button">Refresh</a>
                            <button class="btn bg-danger text-white btn-block" x-on:click="">Disconnect</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}
</form>
