<?php

namespace App\Http\Livewire\Dashboard\Booking\Reschedule;

use App\Models\Booking;
use App\Models\BookingReschedule;
use App\Models\Calendar;
use App\Models\Setting;
use App\Models\Slot;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Create extends Component
{
    public $bookingId, $booking, $date, $slot, $reason, $calendars = [], $slots = [];

    protected $listeners = [
        'RescheduleBooking' => 'rescheduleBookingId',
    ];

    protected $rules = [
        'bookingId' => 'required|exists:bookings,id',
        'date' => 'required|exists:calendars,id',
        'slot' => 'required',
        'reason' => 'required|max:500',
    ];

    public function rescheduleBookingId($bookingId)
    {
        $this->bookingId = $bookingId;
        $this->booking = Booking::find($this->bookingId);
        $this->calendars = $this->getData();
        $this->date = "";
        $this->slot = "";
        $this->reason = "";
    }

    public function rescheduleBooking()
    {
        $this->validate();
        try {
            $consultant = auth('consultant')->user();
            DB::beginTransaction();
            $setting = Setting::first();
            $slot = Slot::where('consultant_id', $consultant->id)->search($this->slot)->first()->toArray();
            if ($this->booking->slot_id == $this->slot && $this->booking->slot == $this->slot) {
                return $this->addError('slot', 'Please select different slot');
            }

            $rescheduleBooking = new BookingReschedule;
            $rescheduleBooking->booking_id = $this->bookingId;
            $rescheduleBooking->slot_id = $slot['id'];
            $rescheduleBooking->slot = \Carbon\Carbon::createFromFormat('H:i A', $this->slot)->format('h:i:s');
            $rescheduleBooking->old_slot_id = $this->booking->slot_id;
            $rescheduleBooking->old_slot = $this->booking->slot;
            $rescheduleBooking->reason = $this->reason;
            $rescheduleBooking->save();

            $this->booking->slot_id = $rescheduleBooking->slot_id;
            $this->booking->slot = $rescheduleBooking->slot;
            $this->booking->save();
            $booking = $this->booking;
            Mail::send('mail.reschedule-meeting-link', [
                'reason' => $this->reason,
                'setting' => $setting,
                'booking' => $this->booking,
                'is_consultation' => $booking?->is_consultation ?? false,
                'slot_time' => $this->slot,
                'slot' => $slot,
                'date' => $this->calendars[$this->date],
            ], function ($message) use ($booking) {
                $message->to($booking->email, $booking->name);
                $message->subject('Your meeting has been rescheduled');
            });
            $this->emit('displayMessage', 'Booking has been rescheduled');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th->getMessage(), $th);
            $this->emit('displayMessage', 'Error Accured! Booking has not been rescheduled', false);
        }
    }

    public function render()
    {
        $dates = $this->calendars;
        return view('livewire.dashboard.booking.reschedule.create', compact('dates'));
    }

    public function updatedDate()
    {
        if ($this->date) {
            if ($this->booking?->is_consultation) {
                $this->slots = array_merge(
                    $this->calendars[$this->date]['available_slots'],
                    $this->calendars[$this->date]['available_consultation_slots']
                );
            } else {
                $this->slots = $this->calendars[$this->date]['available_slots'];
            }

        } else {
            $this->slots = [];
        }

    }

    public function getData()
    {
        try {
            $consultant = auth('consultant')->user();
            $today = now()->format("Y-m-d");
            $sixMonthsAfter = now()->addMonths(6)->format("Y-m-d");
            if ($this->booking?->is_consultation) {
                return Calendar::with('available_slots', 'available_consultation_slots.booking')
                    ->where('consultant_id', $consultant->id)
                    ->whereRaw("date(`date`) >= date('{$today}')")
                    ->whereRaw("date(`date`) <= date('{$sixMonthsAfter}')")
                    ->orderBy('date')
                    ->get()->keyBy('id')->toArray();
            }

            return Calendar::with('available_slots')
                ->has('available_slots')
                ->where('consultant_id', $consultant->id)
                ->whereRaw("date(`date`) >= date('{$today}')")
                ->whereRaw("date(`date`) <= date('{$sixMonthsAfter}')")
                ->orderBy('date')
                ->get()->keyBy('id')->toArray();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
