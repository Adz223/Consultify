<main class="page-body" x-data="slot">
    <div class="container-fluid">
        <div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
            <div class="col-xxl-12 col-xl-12 col-lg-12 order-1 order-xxl-0">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Slots</h4>
                        <a class="btn bg-dark text-white btn-block" href="{{ route('admin.slot.create', ['calendar' => $calendar->id]) }}" role="button">Add</a>
                    </div>
                    <div class="card-body">
                        @if ($msg)
                            <div class="alert alert-danger" role="alert">
                                <strong>Error!</strong> {{ $msg }}
                            </div>
                        @endif
                        <div class="row g-3" style="overflow-x:auto;">
                            <table class="text-center">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Service Slot</th>
                                        <th>Consultation Slot 1</th>
                                        <th>Consultation Slot 2</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slots as $slot)
                                        <tr>
                                            <td>{{ $calendar->date }}</td>
                                            <td>{{ $slot->service_slot_time }}</td>
                                            <td>{{ $slot->consultation_slot_time }}</td>
                                            <td>{{ $slot->another_consultation_slot_time }}</td>
                                            <td>
                                                {{-- <a class="btn bg-dark text-white btn-block" href="{{ route('admin.slot', ['calendar' => $calendar->id, 'slot' => $slot->id]) }}" role="button">
                                                    <i class="fa fa-eye"></i>
                                                    Edit
                                                </a> --}}
                                                <button class="btn bg-dark text-white btn-block" x-on:click="deleteConfirmation({{ $slot->id }})">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                    {{-- Delete --}}
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between">
                                <p>Showing {{ $slots->firstItem() }} to {{ $slots->lastItem() }} from {{ $slots->total() }}</p>
                                {{ $slots->onEachSide(0)->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteSlotModal" tabindex="-1" aria-labelledby="deleteSlotModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteSlotModalLabel">Confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are You Sure?
                </div>
                <div class="modal-footer">
                    <button type="button" x-on:click="deleteSlot" class="btn btn-dark text-white btn-block">Yes</button>
                    <button type="button" class="btn btn-dark text-white btn-block" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</main>
@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('slot', () => ({
                open: false,
                slotId: "",
                deleteConfirmation(slotId) {
                    this.slotId = slotId
                    $("#deleteSlotModal").modal('show')
                },
                deleteSlot(){
                    this.$wire.deleteSlot(this.slotId)
                    $("#deleteSlotModal").modal('hide')
                }
            }))
        })
    </script>
@endpush
