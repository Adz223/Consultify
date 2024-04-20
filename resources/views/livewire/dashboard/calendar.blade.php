<main class="page-body" x-data="calendar">
  <div class="container-fluid">
    <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
      <div class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
        <div class="card mt-3">
          <div class="card-header">
            <h4 class="card-title mb-0">Calendar</h4>
            <div class="div">
              <a class="btn bg-dark text-white btn-block" href="{{ route('admin.calendar.bulkcreate') }}"
                role="button">Bulk Add</a>
              <a class="btn bg-dark text-white btn-block" href="{{ route('admin.calendar.create') }}"
                role="button">Add</a>
            </div>
          </div>
          <div class="card-body">
            <div class="row g-3" style="overflow-x:auto;">
              <table class="text-center">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Slots</th>
                    <th>Last Updated At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($calendars as $calendar)
                    <tr>
                      <td>{{ $calendar->date }}</td>
                      <td>{{ $calendar->slots_count }}</td>
                      <td>
                        {{ $calendar->lastSlot?->updated_at->format('j M, Y') }}
                      </td>
                      <td>
                        <a class="btn bg-dark text-white btn-block"
                          href="{{ route('admin.slot', ['calendar' => $calendar->id]) }}" role="button">
                          <i class="fa fa-eye"></i>
                          {{-- Edit --}}
                        </a>
                        <button class="btn bg-dark text-white btn-block"
                          x-on:click="deleteConfirmation({{ $calendar->id }})">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                          {{-- Delete --}}
                        </button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-between">
                <p>Showing {{ $calendars->firstItem() }} to {{ $calendars->lastItem() }} from {{ $calendars->total() }}
                </p>
                {{ $calendars->onEachSide(0)->links() }}
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
  </div>
  </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="deleteCalendarModal" tabindex="-1" aria-labelledby="deleteCalendarModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteCalendarModalLabel">Confirmation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are You Sure?
        </div>
        <div class="modal-footer">
          <button type="button" x-on:click="deleteCalendar" class="btn btn-dark text-white btn-block">Yes</button>
          <button type="button" class="btn btn-dark text-white btn-block" data-bs-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="container-fluid">
        <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
            <div class="col-xxl-9 col-xl-12 col-lg-12 order-1 order-xxl-0">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-center" id="menu-navi">
                            <div class="d-flex align-items-center my-1">
                                <button class="btn bg-secondary text-light me-2 lnb-new-schedule-btn" id="btn-new-schedule"
                                    type="button" data-bs-toggle="modal">New schedule</button>
                                <button class="btn btn-primary move-today" type="button"
                                    data-action="move-today">Today</button>
                            </div>
                            <div class="fs-5 fw-bold my-1" id="renderRange"></div>
                            <div class="d-flex align-items-center my-1">
                                <div class="dropdown morphing scale-left">
                                    <button class="btn btn-primary dropdown-toggle" id="dropdownMenu-calendarType"
                                        type="button" data-bs-toggle="dropdown"><i id="calendarTypeIcon"></i><span
                                            class="ms-1" id="calendarTypeName">Dropdown</span></button>
                                    <ul class="dropdown-menu border-0 shadow" role="menu">
                                        <li role="presentation"><a class="dropdown-item dropdown-menu-title" role="menuitem"
                                                data-action="toggle-daily"><i class="fa fa-bars me-2"></i>Daily</a></li>
                                        <li role="presentation"><a class="dropdown-item dropdown-menu-title" role="menuitem"
                                                data-action="toggle-weekly"><i class="fa fa-th-large me-2"></i>Weekly</a>
                                        </li>
                                        <li role="presentation"><a class="dropdown-item dropdown-menu-title" role="menuitem"
                                                data-action="toggle-monthly"><i class="fa fa-th me-2"></i>Month</a></li>
                                        <li role="presentation"><a class="dropdown-item dropdown-menu-title" role="menuitem"
                                                data-action="toggle-weeks2"><i class="fa fa-th-large me-2"></i>2 weeks</a>
                                        </li>
                                        <li role="presentation"><a class="dropdown-item dropdown-menu-title" role="menuitem"
                                                data-action="toggle-weeks3"><i class="fa fa-th-large me-2"></i>3 weeks</a>
                                        </li>
                                        <li class="dropdown-divider" role="presentation"></li>
                                        <li role="presentation"><a class="dropdown-item" role="menuitem"
                                                data-action="toggle-workweek"> <input
                                                    class="tui-full-calendar-checkbox-square" type="checkbox"
                                                    value="toggle-workweek" checked=""><span
                                                    class="checkbox-title"></span>Show weekends</a></li>
                                        <li role="presentation"><a class="dropdown-item" role="menuitem"
                                                data-action="toggle-start-day-1"> <input
                                                    class="tui-full-calendar-checkbox-square" type="checkbox"
                                                    value="toggle-start-day-1"><span class="checkbox-title"></span>Start
                                                Week on Monday</a></li>
                                        <li role="presentation"><a class="dropdown-item" role="menuitem"
                                                data-action="toggle-narrow-weekend"> <input
                                                    class="tui-full-calendar-checkbox-square" type="checkbox"
                                                    value="toggle-narrow-weekend"><span
                                                    class="checkbox-title"></span>Narrower than weekdays</a></li>
                                    </ul>
                                </div>
                                <div class="ms-2">
                                    <button class="btn btn-outline-secondary move-day" type="button"
                                        data-action="move-prev"><i class="fa fa-angle-left"
                                            data-action="move-prev"></i></button>
                                    <button class="btn btn-outline-secondary move-day" type="button"
                                        data-action="move-next"><i class="fa fa-angle-right"
                                            data-action="move-next"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-body" id="lnb">
                        <div class="d-flex flex-wrap justify-content-between align-items-center" id="lnb-calendars">
                            <div class="d-flex flex-wrap" id="calendarList"></div>
                            <div class="lnb-calendars-item">
                                <label>
                                    <input class="tui-full-calendar-checkbox-square" type="checkbox" value="all"
                                        checked=""><span></span><strong>View all</strong>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="border" id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</main>
@push('scripts')
  <script>
    document.addEventListener('alpine:init', () => {
      Alpine.data('calendar', () => ({
        open: false,
        calendarId: "",
        deleteConfirmation(calendarId) {
          this.calendarId = calendarId
          $("#deleteCalendarModal").modal('show')
        },
        deleteCalendar() {
          this.$wire.deleteCalendar(this.calendarId)
          $("#deleteCalendarModal").modal('hide')
        }
      }))
    })
  </script>
@endpush
