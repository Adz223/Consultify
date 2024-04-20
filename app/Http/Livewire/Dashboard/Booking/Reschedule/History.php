<?php

namespace App\Http\Livewire\Dashboard\Booking\Reschedule;

use App\Models\BookingReschedule;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search, $pageLimit = 10;

    public function render()
    {
        return view('livewire.dashboard.booking.reschedule.history', ['bookings' => $this->getData()]);
    }

    public function getData()
    {
        $consultant = auth('consultant')->user();
        return BookingReschedule::with('slotDetail.date', 'booking.slotDetail.date')
            ->whereHas('booking', fn($q) => $q->where('consultant_id', $consultant->id))
            ->latest()->paginate($this->pageLimit);
    }
}
