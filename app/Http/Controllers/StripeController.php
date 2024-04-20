<?php

namespace App\Http\Controllers;

use App\Events\NewBooking;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\Slot;
use App\Models\StripeBooking;
use App\Traits\StripeCheckout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{
    use StripeCheckout;

    public function cancelled(Request $request)
    {
        return redirect()->route('home');
    }

    public function success(Request $request)
    {
        $checkoutSession = $this->getSession($request->session_id);
        $stripeBooking = StripeBooking::find($checkoutSession->client_reference_id);
        $setting = Setting::first();
        $slot = Slot::find($stripeBooking->slot_id)->toArray();
        $booking = new Booking;
        $booking->firstname = $stripeBooking->firstname;
        $booking->lastname = $stripeBooking->lastname;
        $booking->email = $stripeBooking->email;
        $booking->contact = $stripeBooking->contact;
        $booking->country = $stripeBooking->country;
        $booking->slot_id = $stripeBooking->slot_id;
        $booking->service_id = $stripeBooking->service_id;
        $booking->date = $stripeBooking->date;
        $booking->slot = $stripeBooking->slot;
        $booking->price = $stripeBooking->price;
        $booking->booking_status_id = $stripeBooking->booking_status_id;
        $booking->save();
        $payment = new Payment;
        $payment->booking_id = $booking->id;
        $payment->payment_details = json_encode($checkoutSession);
        $payment->save();
        Mail::send('mail.booking', [
            'setting' => $setting,
            'slot' => $slot,
            'booking' => $booking,
            'is_consultation' => false,
            'date' => ['date' => $stripeBooking->date],
        ], function ($message) use ($booking) {
            $message->to($booking->email, $booking->name);
            $message->subject('Meeting Details');
        });
        event(new NewBooking($booking));
        session()->put('msg', 'Service has been booked.');
        return redirect()->route('home');
    }
}
