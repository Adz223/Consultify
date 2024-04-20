<?php

namespace App\Http\Livewire;

use App\Events\NewBooking;
use App\Models\Booking as BookingModel;
use App\Models\Calendar;
use App\Models\Setting;
use App\Models\Slot;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Throwable;

class ConsultationBooking extends Component
{
    public $currentMonth, $currentYear, $errorMessage, $step, $events, $message, $setting, $wholeCalendar, $calendar, $wholeSlots, $slots;
    public $firstname, $lastname, $contact, $country, $email, $date, $slot, $isPayment;
    public $card_number, $expiry_month, $cvc;

    protected $rules = [
        "firstname" => "required|max:100",
        "lastname" => "required|max:100",
        "email" => "required|email|max:100",
        "contact" => "required",
        "date" => "required|exists:calendars,id",
        "slot" => "required",
    ];

    public function mount()
    {
        $now = now();
        $this->setting = Setting::first();
        $this->currentMonth = $now->format("m");
        $this->currentYear = $now->format("Y");
        $this->slots = [];
        $this->isPayment = false;
        $this->step = 1;
        // dd(session()->all());
        if (session()->has('msg')) {
            $this->message = session()->get('msg');
            session()->forget('msg');
        }

    }

    public function changeStep()
    {
        $this->step = 2;
    }

    public function updatedDate()
    {
        $this->slot = '';
        $this->slots = [];
        if ($this->date) {
            if (!isset($this->wholeCalendar[$this->date])) {
                return;
            }

            $allSlots = $this->wholeCalendar[$this->date]['slots'];
            $this->wholeSlots = collect($allSlots)->sortBy('slot')->toArray();
            $slots = array_merge(
                $this->calendar[$this->date]['available_slots'],
                $this->calendar[$this->date]['available_consultation_slots']
            );
            if (!empty($slots)) {
                $this->slots = collect($slots)->sortBy('slot')->toArray();
            }

        }
    }
    public function checkBookingDetails()
    {
        $this->validate();
        if (!Slot::search($this->slot)->where('calendar_id', $this->date)->exists()) {
            return $this->addError('slot', 'Slot not exists');
        }

        if (!$this->setting->zoom_meeting_link) {
            $this->errorMessage = "Meeting Link not added. Please contact support.";
            $this->setting = Setting::first();
        } else {
            $this->isPayment = true;
        }

    }

    public function book()
    {
        $this->validate();
        // $this->validate([
        //     "card_number" => "required|digits:16",
        //     "expiry_month" => "required|date_format:Y-m",
        //     "cvc" => "required|digits:3",
        // ]);
        try {
            $slot = Slot::search($this->slot)->where('calendar_id', $this->date)->first()->toArray();
            DB::beginTransaction();
            $booking = new BookingModel;
            $booking->firstname = $this->firstname;
            $booking->lastname = $this->lastname;
            $booking->email = $this->email;
            $booking->country = $this->country;
            $booking->contact = $this->contact;
            $booking->slot_id = $slot['id'];
            // $booking?->is_consultation = false;
            $booking->price = $this->setting->consultation_price;
            $booking->date = $this->calendar[$this->date]['date'];
            $booking->slot = \Carbon\Carbon::createFromFormat('H:i A', $this->slot)->format('h:i:s');
            $booking->booking_status_id = 1;
            $booking->save();
            // $payment = new Payment;
            // $payment->payment_details = $paymentDetails;
            // $payment->save();

            // $month = explode("-", $this->expiry_month);
            // $payment = new CardDetails;
            // $payment->booking_id = $booking->id;
            // $payment->card_number = $this->card_number;
            // $payment->expiry_month = $month[1];
            // $payment->expiry_year = Str::substr($month[0], 2, 3);
            // $payment->cvc = $this->cvc;
            // $payment->save();
            Mail::send('mail.booking', [
                'booking' => $booking,
                'date' => $this->calendar[$this->date],
            ], function ($message) use ($booking) {
                $message->to($booking->email, $booking->firstname . " " . $booking->lastname);
                $message->subject('Meeting Details');
            });
            event(new NewBooking($booking));
            // $this->firstname = "";
            // $this->lastname = "";
            // $this->email = "";
            // $this->contact = "";
            // $this->date = "";
            // $this->country = "";
            // $this->slot = "";
            // $this->price = "";
            // $this->calendar = $this->getData();
            // $this->wholeCalendar = $this->getWholeData();
            // $this->getDates();
            // $this->slots = [];
            session()->put('msg', "Slot has been booked");
            // $this->errorMessage = "";
            // $this->isPayment = false;
            DB::commit();
            return redirect()->route('consultation.booking');
        } catch (Throwable $th) {
            DB::rollback();
            // dd($th);
            $this->isPayment = false;
            // $this->errorMessage = $th->getMessage();
            $this->errorMessage = "Error Accured please try later.";
        }
    }

    public function render()
    {
        $data = [
            "msg" => $this->message,
            "errorMsg" => $this->errorMessage,
            "dates" => $this->calendar,
        ];
        // $this->message = "";
        $this->errorMessage = "";
        return view('livewire.consultation-booking', $data)->layout('layouts.web')->layoutData([
            'imageUrl' => "web2assets/images/Consult.png",
            'heading' => "Book Consultation",
        ]);
    }

    public function selectSlot($slot)
    {
        $this->slot = $slot;
    }

    public function getDates()
    {
        $dates = [];
        foreach ($this->calendar as $key => $date) {
            $count = count($date['available_slots']) * 2;
            if (isset($date['available_consultation_slots']) && !empty($date['available_consultation_slots'])) {
                foreach ($date['available_consultation_slots'] as $check) {
                    if ($check['bookings_count'] < 2) {
                        $count++;
                    }

                }
            }
            if ($count > 0) {
                $dates[] = [
                    'id' => $key,
                    // 'title' => "({$count}) slot(s) available",
                    'title' => " ",
                    'start' => $date['date'],
                    'backgroundColor' => '#3788d8',
                    'extendedProps' => ['is_available' => true],
                ];
            }

        }
        foreach (collect($this->wholeCalendar)->whereNotIn('id', collect($dates)->pluck('id')) as $key => $date) {
            $dates[] = [
                'id' => $key,
                // 'title' => "(0) slot(s) available",
                'title' => " ",
                'start' => $date['date'],
                'backgroundColor' => '#FF0000',
                'extendedProps' => ['is_available' => false],
            ];
        }
        $this->events = $dates;
    }

    public function getData()
    {
        return Calendar::with(['available_slots', 'available_consultation_slots' => function ($q) {
            return $q->with('bookings')->withCount('bookings')->having('bookings_count', 1);
        }])->whereRaw("month(`date`) = '{$this->currentMonth}' and year(`date`) = '{$this->currentYear}' ")
            ->whereRaw("date(`date`) >= '" . now()->format("Y-m-d") . "'")->orderBy('date')
            ->get()->keyBy('id')->toArray();
    }

    public function getWholeData()
    {
        return Calendar::with('slots')
            ->whereRaw("month(`date`) = '{$this->currentMonth}' and year(`date`) = '{$this->currentYear}' ")
            ->whereRaw("date(`date`) >= '" . now()->format("Y-m-d") . "'")
            ->orderBy('date')
            ->get()->keyBy('id')->toArray();
    }

    public function getMonthData($month, $year)
    {
        $this->currentMonth = $month;
        $this->currentYear = $year;
        $this->calendar = $this->getData();
        $this->wholeCalendar = $this->getWholeData();
        $this->getDates();
    }
}
