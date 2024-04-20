<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StripeBooking;
use App\Models\Service;
use App\Models\Slot;
use App\Traits\StripeCheckout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Events\NewBooking;
use App\Models\Booking;
use App\Models\BookingReschedule;
use App\Models\Payment;
use App\Models\Setting;

class BookingController extends Controller
{
    use StripeCheckout;

    public function stripeCheckout(Request $request) {
        $request->validate([
            "firstname" => "required|max:100",
            "lastname" => "required|max:100",
            "email" => "required|email|max:100",
            "contact" => "required",
            "country" => "required",
            "calendarId" => "required|exists:calendars,id",
            "slotId" => "required|exists:slots,id",
            "serviceId" => "required|exists:services,id",
            "currency" => "required|in:GBP,USD,EUR,MAD",
            "successUrl" => "required|url",
            "cancelUrl" => "required|url",
        ]);
        try {
            $user = auth('sanctum')->user();
            $slot = Slot::with('date')->find($request->slotId);
            $service = Service::find($request->serviceId);
            $setting = Setting::first();
            DB::beginTransaction();
            $user->load('bookings');
            if ($user->bookings->count() > 0) {
                $stripeBooking = new StripeBooking;
                $stripeBooking->firstname = $request->firstname;
                $stripeBooking->lastname = $request->lastname;
                $stripeBooking->email = $request->email;
                $stripeBooking->contact = $request->contact;
                $stripeBooking->country = $request->country;
                $stripeBooking->slot_id = $request->slotId;
                $stripeBooking->is_consultation = false;
                $stripeBooking->service_id = $service->id;
                $stripeBooking->price = $service->getPrice($request->currency);
                $stripeBooking->date = $slot->date->date;
                $stripeBooking->slot = $slot->slot;
                $stripeBooking->booking_status_id = 1;
                $stripeBooking->save();
                DB::commit();
                $checkout = $this->checkout($stripeBooking->id, $service->id, $service->name, $stripeBooking->price, $request->currency, $request->successUrl, $request->cancelUrl);
                return response()->json([
                    'message' => "Link generated",
                    "checkout_url" => $checkout->url
                ]);
            }
            else {
                $booking = new Booking;
                $booking->firstname = $request->firstname;
                $booking->lastname = $request->lastname;
                $booking->email = $request->email;
                $booking->contact = $request->contact;
                $booking->country = $request->country;
                $booking->slot_id = $request->slotId;
                $booking->service_id = $service->id;
                $booking->date = $slot->date->date;
                $booking->slot = $slot->slot;
                $booking->price = $service->getPrice($request->currency);
                $booking->booking_status_id = 1;
                $booking->consultant_id = $slot->consultant_id;
                $booking->customer_id = $user->id;
                $booking->save();
                $payment = new Payment;
                $payment->booking_id = $booking->id;
                $payment->payment_details = "{}";
                $payment->save();
                Mail::send('mail.booking', [
                    'setting' => $setting,
                    'slot' => $slot->toArray(),
                    'booking' => $booking,
                    'is_consultation' => false,
                    'date' => ['date' => $booking->date],
                ], function ($message) use ($booking) {
                    $message->to($booking->email, $booking->name);
                    $message->subject('Meeting Details');
                });
                event(new NewBooking($booking));
                DB::commit();
                return response()->json([
                    'message' => "Booking successful",
                    "booking" => $booking
                ]);
            }    
            // return redirect()->route('booking', ['service' => $this->service->id]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function saveBooking(Request $request) {
        try {
            $user = auth('sanctum')->user();
            DB::beginTransaction();
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
            $booking->consultant_id = $slot['consultant_id'];
            $booking->customer_id = $user->id;
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
            DB::commit();
            return response()->json([
                'message' => "Booking successful",
                "booking" => $booking
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function bookings() {
        $customer = auth('sanctum')->user();
        $bookings = Booking::where('customer_id', $customer->id)->doesnthave('reschedule')->latest()->get();
        
        $rescheduleBookings =  BookingReschedule::with('slotDetail.date', 'booking.slotDetail.date')
            ->whereHas('booking', fn($q) => $q->where('customer_id', $customer->id))
            ->latest()->get();

        return response()->json([
            'bookings' => $bookings,
            'rescheduleBookings' => $rescheduleBookings
        ]);
    }
}
