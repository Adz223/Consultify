<?php

namespace App\Http\Livewire;

use App\Events\NewBooking;
use App\Models\Booking as BookingModel;
use App\Models\Calendar;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Setting;
use App\Models\StripeBooking;
use App\Traits\StripeCheckout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Booking extends Component
{
    use StripeCheckout;
    public $currentMonth, $currentYear, $stripeBooking, $errorMessage;
    public $step, $currency = "GBP", $events, $message, $service, $setting, $wholeCalendar, $calendar, $wholeSlots, $slots;
    public $firstname, $lastname, $contact, $country, $email, $date, $slot, $isPayment, $summary, $oldBooking;

    protected $rules = [
        "firstname" => "required|max:100",
        "lastname" => "required|max:100",
        "email" => "required|email|max:100",
        "contact" => "required",
        "country" => "required",
        "date" => "required|exists:calendars,id",
        "slot" => "required|exists:slots,id",
        "currency" => "required|in:GBP,USD,EUR,MAD",
    ];

    public function mount(Service $service)
    {
        $now = now();
        $request = request()->all();
        $this->service = $service;
        $this->setting = Setting::first();
        $this->currentMonth = $now->format("m");
        $this->currentYear = $now->format("Y");
        $this->slots = [];
        $this->isPayment = false;
        $this->step = 1;
        if (session()->has('msg')) {
            $this->message = session()->get('msg');
            session()->forget('msg');
        }
        if (isset($request['date']) && isset($request['slot']) && isset($request['summary']) && isset($request['booking'])) {
            $this->calendar = Calendar::with('available_slots')
                ->has('available_slots')
                ->where('id', $request['date'])
                ->orderBy('date')
                ->get()->keyBy('id')->toArray();
            $this->wholeCalendar = Calendar::with('slots')
                ->where("id", $request['date'])
                ->orderBy('date')
                ->get()->keyBy('id')->toArray();
            $this->oldBooking = BookingModel::find($request['booking']);
            if (empty($this->calendar) || empty($this->wholeCalendar) || empty($this->oldBooking)) {
                $this->errorMessage = "Error Accured please try later.";
            } else {
                $this->date = $request['date'];
                $this->date = $request['date'];
                $this->updatedDate();
                $this->selectSlot($request['slot']);
                $this->summary = $request['summary'];
                $this->changeStep();
                $this->firstname = $this->oldBooking->firstname;
                $this->lastname = $this->oldBooking->lastname;
                $this->contact = $this->oldBooking->contact;
                $this->country = $this->oldBooking->country;
                $this->email = $this->oldBooking->email;
                $this->checkBookingDetails();
            }
        }
    }

    public function changeStep()
    {
        $this->step = 2;
    }

    public function updatedDate()
    {
        if ($this->date) {
            $this->slot = '';
            $this->wholeSlots = collect($this->wholeCalendar[$this->date]['slots'])->sortBy('slot')->toArray();
            $this->slots = collect($this->calendar[$this->date]['available_slots'])->sortBy('slot')->toArray();
        } else {
            $this->slots = [];
        }
    }
    public function checkBookingDetails()
    {
        $this->errorMessage = "";
        $this->validate();
        try {
            $slot = collect($this->slots)->firstWhere('id', $this->slot);
            DB::beginTransaction();
            $this->stripeBooking = new StripeBooking;
            $this->stripeBooking->firstname = $this->firstname;
            $this->stripeBooking->lastname = $this->lastname;
            $this->stripeBooking->email = $this->email;
            $this->stripeBooking->contact = $this->contact;
            $this->stripeBooking->country = $this->country;
            $this->stripeBooking->slot_id = $this->slot;
            $this->stripeBooking->is_consultation = false;
            $this->stripeBooking->service_id = $this->service->id;
            $this->stripeBooking->price = $this->service->getPrice($this->currency);
            $this->stripeBooking->date = $this->calendar[$this->date]['date'];
            $this->stripeBooking->slot = $slot['slot'];
            $this->stripeBooking->booking_status_id = 1;
            $this->stripeBooking->save();
            $this->isPayment = true;
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            $this->errorMessage = $th->getMessage();
            // $this->errorMessage = "Error Accured please try later.";
        }
    }

    public function book($paymentDetails)
    {
        $this->validate();
        try {
            $slot = collect($this->slots)->firstWhere('id', $this->slot);
            DB::beginTransaction();
            $booking = new BookingModel;
            $booking->firstname = $this->firstname;
            $booking->lastname = $this->lastname;
            $booking->email = $this->email;
            $booking->contact = $this->contact;
            $booking->country = $this->country;
            $booking->slot_id = $this->slot;
            $booking->service_id = $this->service->id;
            $booking->price = $this->service->getPrice($this->currency);
            $booking->date = $this->calendar[$this->date]['date'];
            $booking->slot = $slot['slot'];
            $booking->currency = $this->currency;
            $booking->booking_status_id = 1;
            $booking->save();
            $payment = new Payment;
            $payment->booking_id = $booking->id;
            $payment->payment_details = $paymentDetails;
            $payment->save();
            Mail::send('mail.booking', [
                'booking' => $booking,
                'date' => $this->calendar[$this->date],
            ], function ($message) use ($booking) {
                $message->to($booking->email, $booking->name);
                $message->subject('Meeting Details');
            });
            event(new NewBooking($booking));
            // $this->firstname = "";
            // $this->lastname = "";
            // $this->email = "";
            // $this->contact = "";
            // $this->country = "";
            // $this->date = "";
            // $this->slot = "";
            // $this->price = "";
            // $this->calendar = $this->getData();
            // $this->wholeCalendar = $this->getWholeData();
            // $this->getDates();
            // $this->slots = [];
            // session()->put('msg', "Slot has been booked");
            // $this->errorMessage = "";
            // $this->isPayment = false;
            DB::commit();
            // return redirect()->route('booking', ['service' => $this->service->id]);
        } catch (\Throwable $th) {
            DB::rollback();
            // dd($th);
            $this->isPayment = false;
            $this->errorMessage = "Error Accured please try later.";
        }
    }

    public function render()
    {
        $data = [
            'msg' => $this->message,
            'errorMsg' => $this->errorMessage,
            'dates' => $this->calendar,
            'checkout' => null,
        ];
        $this->message = "";
        $this->errorMessage = "";
        if ($this->isPayment) {
            $data['checkout'] = $this->checkout($this->stripeBooking->id, $this->service->id, $this->service->name, $this->stripeBooking->price, $this->currency);
        }
        return view('livewire.booking', $data)->layout('layouts.web')->layoutData([
            'imageUrl' => "./assets/Servisebooking.jpeg",
            'heading' => "Booking",
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
            $count = count($date['available_slots']);
            if (isset($date['available_consultation_slots']) && !empty($date['available_consultation_slots'])) {
                $count += count($date['available_slots']);
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
        return Calendar::with('available_slots')
            ->has('available_slots')
            ->whereRaw("month(`date`) = '{$this->currentMonth}' and year(`date`) = '{$this->currentYear}' ")
            ->whereRaw("date(`date`) >= '" . now()->format("Y-m-d") . "'")
            ->orderBy('date')
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
