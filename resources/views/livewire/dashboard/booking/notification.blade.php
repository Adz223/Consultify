<div class="offcanvas offcanvas-end" tabindex="-1" id="NotificationsDiv" wire:ignore.self>
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Notifications</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body notification custom_scroll">
    <div class="tab-content mt-4">
      <div class="tab-pane fade show active" id="noti_tab_all" role="tabpanel">
        <ul class="list-group list-group-flush list-group-custom mb-0">
          @foreach ($notifications as $notification)
            <li class="list-group-item">
              <a href="{{ route('admin.booking', ['booking' => $notification['id']]) }}" class="d-flex">
                <div class="avatar sm rounded no-thumbnail p-3"><i class="fa fa-bell-o fa-lg"></i></div>
                <div class="flex-fill ms-3">
                  <p class="mb-0">
                    New Booking on
                    <strong class="text-primary">
                      {{ $notification['date'] }} {{ $notification['meeting_time'] }}
                    </strong>
                    has been added
                  </p>
                  <small>{{ $notification['notification_time'] }}</small>
                </div>
              </a>
            </li>
          @endforeach
          <li @class(['list-group-item text-center', 'd-none' => !$isShowMore])>
            <button class="btn btn-dark text-white btn-block px-5" wire:click.prevent="showMore">
                Show More
                <i class="fa fa-chevron-circle-down mx-1" wire:loading.class="d-none" aria-hidden="true"></i>
                <i class="fa fa-spinner mx-1 d-none" wire:loading.class.remove="d-none" aria-hidden="true"></i>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
