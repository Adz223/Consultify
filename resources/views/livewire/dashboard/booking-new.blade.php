<main class="page-body" x-data="booking">
  <div class="container-fluid">
    <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
      <div class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
        <div class="card mt-3">
          <div class="card-header">
            <h4 class="card-title mb-0">Bookings</h4>
            <a class="btn bg-dark text-white btn-block" href="{{ route('admin.booking.reschedule.history') }}"
              role="button">Reschedule History</a>
          </div>
          <div class="card-body">
            @if ($msg)
              <div class="col-12">
                <div class="alert alert-success" role="alert">
                  <strong>Success!</strong> {{ $msg }}
                </div>
              </div>
            @endif
            @if ($errorMsg)
              <div class="col-12">
                <div class="alert alert-danger" role="alert">
                  <strong>Error!</strong> {{ $errorMsg }}
                </div>
              </div>
            @endif
            <div class="row g-3" style="overflow-x:auto;">
              <table class="text-center table-responsive">
                <thead>
                  <tr>
                    <th style="padding: 0px 20px; text-align:center">#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact #</th>
                    <th>Country</th>
                    <th>Date</th>
                    <th>type</th>
                    <th>Service Name</th>
                    <th>Meeting Time</th>
                    <th>Book At</th>
                    {{-- <th>Status</th> --}}
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($bookings as $booking)
                    <tr>
                      <td class="text-center">{{ $booking->id }}</td>
                      <td>{{ $booking->firstname }}</td>
                      <td>{{ $booking->lastname }}</td>
                      <td>{{ $booking->email }}</td>
                      <td>{{ $booking->contact }}</td>
                      <td>{{ $booking->country }}</td>
                      <td>{{ $booking->date }}</td>
                      <td>
                        <span class="bg-warning text-white px-3 py-1 rounded">Service</span>
                      </td>
                      <td>{{ $booking->service?->name }}</td>
                      <td>{{ $booking->meeting_time }}</td>
                      <td>{{ $booking->created_at->format('j M, Y') }}</td>
                      <td>
                        <button class="btn bg-dark text-white btn-block"
                          x-on:click="rescheduleBooking({{ $booking->id }})">
                          <i class="fa fa-calendar"></i>
                        </button>
                        {{-- <button @class([
                          'btn bg-dark text-white btn-block',
                          'd-none' => !$booking->is_consultation,
                      ]) x-on:click="cardDetails({{ $booking->id }})">
                        <i class="fa fa-eye"></i>
                      </button> --}}
                        <button class="btn bg-dark text-white btn-block"
                          wire:click.prevent="sendMeetingLink({{ $booking->id }})">
                          <i class="fa fa-paper-plane"></i>
                        </button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-between">
                <p>Showing {{ $bookings->firstItem() }} to {{ $bookings->lastItem() }} from {{ $bookings->total() }}
                </p>
                {{ $bookings->onEachSide(0)->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="rescheduleBookingModal" tabindex="-1" aria-labelledby="rescheduleBookingModalLabel"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" wire:ignore.self>
      @livewire('dashboard.booking.reschedule.create')
    </div>
  </div>
  <div class="modal fade" id="ZoomLinkModal" tabindex="-1" aria-labelledby="ZoomLinkModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog" wire:ignore.self>
      <div class="modal-content" wire:ignore.self>
        <div class="modal-header">
          <h1 class="modal-title fs-5">{{ $zoomTopic }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="input-group">
              <input type="text" class="form-control" x-ref="zoomMeetingLinkInput" x-model="zoomMeetingLink">
              <span x-on:click="copyButton"
                class="input-group-addon btn btn-secondary border border-left-1 border-light" title="Click to copy">
                <i class="fa fa-clipboard" aria-hidden="true"></i>
              </span>
              <span x-on:click="openLink" class="input-group-addon btn btn-secondary border border-left-1 border-light"
                title="Click to Open">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark text-white btn-block" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</main>
@push('scripts')
  <script>
    document.addEventListener('livewire:load', (evt) => {
      console.log("event ==> ", evt, Livewire)

    })
    document.addEventListener('alpine:init', () => {
      Alpine.data('booking', () => ({
        rescheduleModal: @entangle('rescheduleModal'),
        zoomMeetingLink: @entangle('zoomMeetingLink'),
        copyButton() {
          var target = this.$refs.zoomMeetingLinkInput
          var currentFocus = document.activeElement;

          target.focus();
          target.setSelectionRange(0, target.value.length);

          // copy the selection
          var succeed;

          try {
            succeed = document.execCommand("copy");
          } catch (e) {
            console.warn(e);

            succeed = false;
          }

          // Restore original focus
          if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
          }

          if (succeed) {
            $(".copied").animate({
              top: -25,
              opacity: 0
            }, 700, function() {
              $(this).css({
                top: 0,
                opacity: 1
              });
            });
          }

          return succeed;
        },
        openLink() {
          window.open(this.zoomMeetingLink, '_blank').focus();
        },
        init() {
          this.$watch('rescheduleModal', value => {
            if (value) $("#rescheduleBookingModal").modal('show')
            else $("#rescheduleBookingModal").modal('hide')
          })
          this.$watch('zoomMeetingLink', zoomMeetingLink => {
            if (zoomMeetingLink) $("#ZoomLinkModal").modal("show")
            else $("#ZoomLinkModal").modal("hide")
          })
        },
        rescheduleBooking(bookingId) {
          this.rescheduleModal = false
          Livewire.emit('RescheduleBooking', bookingId)
          this.rescheduleModal = true
        },
        cardDetails(bookingId) {
          this.$wire.emit('cardDetails', bookingId);
          $("#CardDetailBookingModal").modal('show');
        }
      }))
    })
  </script>
@endpush
