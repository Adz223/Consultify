<main class="page-body" x-data="booking">
  <div class="container-fluid">
    <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
      <div class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
        <div class="card mt-3">
          <div class="card-header">
            <h4 class="card-title mb-0">Rescheduled Bookings</h4>
          </div>
          <div class="card-body">
            <div class="row g-3" style="overflow-x:auto;">
              <table class="text-center">
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact #</th>
                    <th>Old Meeting Time</th>
                    <th>New Meeting Time</th>
                    <th>Reschedule At</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($bookings as $booking)
                    <tr>
                      <td>{{ $booking->booking->firstname }}</td>
                      <td>{{ $booking->booking->lastname }}</td>
                      <td>{{ $booking->booking->email }}</td>
                      <td>{{ $booking->booking->contact }}</td>
                      <td>{{ $booking->slotDetail->date->date }}
                        {{ $booking->booking->getMeetingTime($booking->old_slot) }}</td>
                      <td>{{ $booking->booking->date }} {{ $booking->booking->meeting_time }}</td>
                      {{-- <td>
                          @switch($booking->booking_status_id)
                              @case(2)
                                  <span class="bg-success text-white px-3 py-1 rounded">Accepted</span>
                                  @break
                              @case(3)
                                  <span class="bg-danger text-white px-3 py-1 rounded">rejected</span>
                                  @break
                              @default
                              <span class="bg-warning text-white px-3 py-1 rounded">Pending</span>
                          @endswitch
                        </td> --}}
                      <td>{{ $booking->created_at->format('j M, Y') }}</td>
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
</main>
