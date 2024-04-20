<main class="page-body">
    <div class="container-fluid">
        <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
            <div class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
                <form wire:submit.prevent='addDate' class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Date</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 px-5">
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Date</label>
                                <input type="date" wire:model.lazy='date' class="form-control" placeholder="Date">
                                @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        @foreach ($slots as $i => $slot)
                            <div class="row g-3 px-5 pt-4">
                                <div class="col-md-12">
                                    <h5>Slot {{ $loop->iteration }}:</h5>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small text-muted">Time Start</label>
                                    <select wire:model.lazy='slots.{{$i}}.slot' class="form-control" placeholder="Slot">
                                        <option value="">Please Select an option</option>
                                        @foreach ($defaultSlots as $key => $item)
                                            <option value="{{ $key }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                    @error("slots.{$i}.slot") <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-2 d-none">
                                    <label class="form-label small text-muted">Service Slot</label>
                                    <input type="text" disabled value="{{ $slots[$i]['service_slot_time'] }}" class="form-control" placeholder="Service Slot">
                                </div>
                                <div class="col-md-2 d-none">
                                    <label class="form-label small text-muted">Consulation Slots 1</label>
                                    <input type="text" disabled value="{{ $slots[$i]['consultation_slot_time'] }}" class="form-control" placeholder="Consultation Slot 1">
                                </div>
                                <div class="col-md-2 d-none">
                                    <label class="form-label small text-muted">Consulation Slots 2</label>
                                    <input type="text" disabled value="{{ $slots[$i]['another_consultation_slot_time'] }}" class="form-control" placeholder="Consultation Slot 2">
                                </div>
                                <div class="col-md-3 d-flex align-items-center">
                                    <button type="button" class="btn bg-dark text-white btn-block" wire:click="addSlot">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn bg-danger text-white btn-block" wire:click="removeSlot({{$i}})">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                        @foreach ($slotErrors as $slotError)
                            <div class="alert alert-danger" role="alert">
                                <strong>Error!</strong> {{ $slotError }}
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('admin.user') }}" class="btn bg-dark text-white btn-block">Back</a>
                        <button type="submit" class="btn bg-dark text-white btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
