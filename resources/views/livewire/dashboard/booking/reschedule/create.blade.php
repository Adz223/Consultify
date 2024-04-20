<div class="modal-content" wire:ignore.self>
  <div class="modal-header">
    <h1 class="modal-title fs-5" id="acceptBookingModalLabel">Reschedule Booking</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <form wire:submit.prevent="rescheduleBooking">
    <div class="modal-body">
      <div class="row">
        <div class="col-8 offset-2 form-group">
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
          <div class="col-8 offset-2 form-group">
            <label>Slot</label>
            <select wire:model.lazy="slot" class="form-control">
              <option value="">Please select an option</option>
              @foreach ($slots as $item)
                <option value="{{ explode(' - ', $item['service_slot_time'])[0] }}">{{ $item['service_slot_time'] }}</option>
              @endforeach
            </select>
            @error('slot')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        @endif
        <div class="col-8 offset-2 form-group">
          <label>Reason</label>
          <textarea wire:model.lazy="reason" class="form-control"></textarea>
          @error('reason')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-dark text-white btn-block">Reschedule</button>
      <button type="button" class="btn btn-dark text-white btn-block" data-bs-dismiss="modal">Cancel</button>
    </div>
  </form>
</div>
