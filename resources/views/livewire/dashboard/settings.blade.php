<main class="page-body" x-data="{ tab: @entangle('tab') }">
  <div class="container-fluid">
    <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
      <div class="col-xxl-9 col-xl-12 col-lg-12 order-1 order-xxl-0">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <button x-on:click="tab='profile-update'" :class="tab == 'profile-update' ? 'active' : ''"
                class="btn tab px-3 py-1 mx-2 bg-dark text-white btn-block">
                Profile
              </button>
              <button x-on:click="tab='contact-detail'" :class="tab == 'contact-detail' ? 'active' : ''"
                class="btn tab px-3 py-1 mx-2 bg-dark text-white btn-block">
                Contact Details
              </button>
              {{-- <button x-on:click="tab='social-link'" class="btn px-3 py-1 mx-2 bg-dark text-white btn-block">
                Social Links
              </button> --}}
              {{-- <button x-on:click="tab='home-content'" class="btn px-3 py-1 mx-2 bg-dark text-white btn-block">
                Slider Content
              </button> --}}
            </div>
            <div class="row mt-5">
              <div x-show="tab=='profile-update'" class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
                @livewire('dashboard.settings.profile-update')
              </div>
              <div x-show="tab=='contact-detail'" class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
                @livewire('dashboard.settings.contact-detail')
              </div>
              {{-- <div x-show="tab=='social-link'" class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
                @livewire('dashboard.settings.social-link')
              </div> --}}
              {{-- <div x-show="tab=='home-content'" class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
                @livewire('dashboard.settings.home-content')
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@push('styles')
    <style>
        button.tab.btn.active {
            box-shadow: 0px 4px 7px black;
            outline: none;
            border: none;
        }
    </style>
@endpush
