<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Booking;
use App\Models\Calendar;
use App\Models\Service as ServiceModel;
use Livewire\Component;
use Livewire\WithPagination;

class Service extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search, $pageLimit = 10;
    public $serviceId, $date, $slot, $summary, $link, $calendars = [], $slots = [];
    public $booking_id, $booking;

    protected $listeners = ["updateLink"];
    protected $rules = [
        'date' => 'required|exists:calendars,id',
        'slot' => 'required|exists:slots,id',
        'summary' => 'required|max:500',
        'booking_id' => 'required|exists:bookings,id',
    ];

    public function mount()
    {
        $this->calendars = $this->getCalendarData();
    }

    public function updated()
    {
        $this->resetErrorBag();
    }

    public function updatedDate()
    {
        if ($this->date) {
            $this->slots = $this->calendars[$this->date]['available_slots'];
        } else {
            $this->slots = [];
        }
    }

    public function updatedBookingId()
    {
        if (!empty($this->booking_id)) {
            $this->booking = Booking::where('id', $this->booking_id)->first();
        }
        if (!$this->booking) {
            $this->addError("booking_id", "booking id is required");
        }
    }

    public function updateLink()
    {
        $this->validate();
        $this->link = route('booking', [
            'service' => $this->serviceId,
            'booking' => $this->booking_id,
            'date' => $this->date,
            'slot' => $this->slot,
            'summary' => $this->summary,
        ]);
        $this->dispatchBrowserEvent('OpenLink', ['link' => $this->link]);
    }

    public function render()
    {
        return view('livewire.dashboard.service', ['services' => $this->getData(), 'dates' => $this->calendars]);
    }

    public function getData()
    {
        return ServiceModel::search($this->search)
            ->orderBy('id', 'desc')
            ->paginate($this->pageLimit);
    }

    public function deleteSerivce($serviceId)
    {
        ServiceModel::where('id', $serviceId)->delete();
    }

    public function getCalendarData()
    {
        try {
            $today = now()->format("Y-m-d");
            $sixMonthsAfter = now()->addMonths(6)->format("Y-m-d");

            return Calendar::with('available_slots')
                ->has('available_slots')
                ->whereRaw("date(`date`) >= date('{$today}')")
                ->whereRaw("date(`date`) <= date('{$sixMonthsAfter}')")
                ->orderBy('date')
                ->get()->keyBy('id')->toArray();
        } catch (\Throwable $th) {
            dd($th);
            throw $th;
        }
    }
}
