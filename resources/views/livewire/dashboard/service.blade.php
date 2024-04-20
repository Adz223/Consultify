<main class="page-body" x-data="service">
  <div class="container-fluid">
    <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
      <div class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
        <div class="card mt-3">
          <div class="card-header">
            <h4 class="card-title mb-0">Services</h4>
            <a class="btn bg-dark text-white btn-block" href="{{ route('admin.service.create') }}" role="button">Add</a>
          </div>
          <div class="card-body">
            <div class="row g-3"style="overflow-x:auto;">
              <table class="text-center">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price (GBP)</th>
                    <th>Price (EUR)</th>
                    <th>Price (MAD)</th>
                    <th>Status</th>
                    <th>Last Updated At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($services as $service)
                    <tr>
                      <td>{{ $service->name }}</td>
                      <td>{{ \Str::limit($service->description, 50, '...') }}</td>
                      <td>{{ $service->price }}</td>
                      <td>{{ $service->eur_price }}</td>
                      <td>{{ $service->mad_price }}</td>
                      <td>
                        <span
                          class="bg-{{ $service->is_active ? 'primary' : 'danger' }} text-white px-3 py-1 rounded">{{ $service->is_active ? 'Active' : 'Inactive' }}</span>
                      </td>
                      <td>{{ $service->updated_at->format('j M, Y') }}</td>
                      <td>
                        <a class="btn bg-dark text-white btn-block"
                          href="{{ route('admin.service.update', ['service' => $service->id]) }}" role="button">
                          <i class="fa fa-edit"></i>
                          {{-- Edit --}}
                        </a>
                        <button class="btn bg-dark text-white btn-block"
                          x-on:click="buyLinkModal({{ $service->id }})">
                          <i class="fa fa-link" aria-hidden="true"></i>
                          {{-- Delete --}}
                        </button>
                        <button class="btn bg-dark text-white btn-block"
                          x-on:click="deleteConfirmation({{ $service->id }})">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                          {{-- Delete --}}
                        </button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-between">
                <p>Showing {{ $services->firstItem() }} to {{ $services->lastItem() }} from {{ $services->total() }}
                </p>
                {{ $services->onEachSide(0)->links() }}
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="deleteServiceModal" tabindex="-1" aria-labelledby="deleteServiceModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteServiceModalLabel">Confirmation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are You Sure?
        </div>
        <div class="modal-footer">
          <button type="button" x-on:click="deleteService" class="btn btn-dark text-white btn-block">Yes</button>
          <button type="button" class="btn btn-dark text-white btn-block" data-bs-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="buyLinkModal" tabindex="-1" aria-labelledby="buyLinkModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog" wire:ignore.self>
      <div class="modal-content" wire:ignore.self>
        <div class="modal-header">
          <h1 class="modal-title fs-5">Service Buy Link</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            {{-- <div class="form-group">
              <input type="text" class="form-control" x-ref="buyLinkInput" x-model="buyLink">
            </div> --}}
            <div class="row">
              <div class="col-10 offset-1 form-group">
                <label>Date</label>
                <select wire:model.lazy="date" class="form-control">
                  <option value="">Please select an option</option>
                  @foreach ($dates as $item)
                    <option value="{{ $item['id'] }}">{{ $item['date'] }}</option>
                  @endforeach
                </select>
                @error('date')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              @if (!empty($date))
                <div class="col-10 offset-1 form-group">
                  <label>Slot</label>
                  <select wire:model.lazy="slot" class="form-control">
                    <option value="">Please select an option</option>
                    @foreach ($slots as $item)
                      <option value="{{ $item['id'] }}">
                        {{ $item['service_slot_time'] }}
                      </option>
                    @endforeach
                  </select>
                  @error('slot')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              @endif
              <div class="col-10 offset-1 form-group">
                <label>Summary</label>
                <textarea wire:model.lazy="summary" class="form-control"></textarea>
                @error('summary')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-10 offset-1 form-group">
                <label>Booking #</label>
                <input wire:model.lazy="booking_id" class="form-control" type="number">
                @error('booking_id')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              @if ($booking)
                <div class="col-5 offset-1">
                  <label>First Name</label>
                  <input class="form-control" value="{{ $booking->firstname }}" disabled>
                </div>
                <div class="col-5">
                  <label>Last Name</label>
                  <input class="form-control" value="{{ $booking->lastname }}" disabled>
                </div>
                <div class="col-5 offset-1">
                  <label>Email</label>
                  <input class="form-control" value="{{ $booking->email }}" disabled>
                </div>
                <div class="col-5">
                  <label>Contact</label>
                  <input class="form-control" value="{{ $booking->contact }}" disabled>
                </div>
              @endif
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark text-white btn-block" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-dark text-white btn-block" wire:click.prevent="updateLink"
            wire:loading.attr="disabled">Create Link</button>
        </div>
      </div>
    </div>
  </div>
</main>
@push('scripts')
  <script>
    window.addEventListener('OpenLink', event => {
      window.open(event.detail.link, '_blank').focus();
    })
    document.addEventListener('alpine:init', () => {
      Alpine.data('service', () => ({
        open: false,
        serviceId: @entangle('serviceId'),
        buyLink: @entangle('link'),
        // copyButton() {
        //   var target = this.$refs.buyLinkInput
        //   var currentFocus = document.activeElement;

        //   target.focus();
        //   target.setSelectionRange(0, target.value.length);

        //   // copy the selection
        //   var succeed;

        //   try {
        //     succeed = document.execCommand("copy");
        //   } catch (e) {
        //     console.warn(e);

        //     succeed = false;
        //   }

        //   // Restore original focus
        //   if (currentFocus && typeof currentFocus.focus === "function") {
        //     currentFocus.focus();
        //   }

        //   if (succeed) {
        //     $(".copied").animate({
        //       top: -25,
        //       opacity: 0
        //     }, 700, function() {
        //       $(this).css({
        //         top: 0,
        //         opacity: 1
        //       });
        //     });
        //   }

        //   return succeed;
        // },
        // openLink() {
        //   window.open(this.buyLink, '_blank').focus();
        // },
        buyLinkModal(serviceId) {
          this.serviceId = serviceId;
          $("#buyLinkModal").modal('show')
        },
        deleteConfirmation(serviceId) {
          this.serviceId = serviceId
          $("#deleteServiceModal").modal('show')
        },
        deleteService() {
          this.$wire.deleteSerivce(this.serviceId)
          $("#deleteServiceModal").modal('hide')
        }
      }))
    })
  </script>
@endpush
